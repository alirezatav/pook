<?php
namespace Bookly\Backend\Modules\Notifications\Forms;

use Bookly\Lib;

/**
 * Class Notifications
 * @package Bookly\Backend\Modules\Notifications\Forms
 */
class Notifications extends Lib\Base\Form
{
    public $types = array(
        'single' => array(
            'client_pending_appointment',
            'staff_pending_appointment',
            'client_approved_appointment',
            'staff_approved_appointment',
            'client_cancelled_appointment',
            'staff_cancelled_appointment',
            'client_rejected_appointment',
            'staff_rejected_appointment',
            'client_new_wp_user',
            'client_reminder',
            'client_reminder_1st',
            'client_reminder_2nd',
            'client_reminder_3rd',
            'client_follow_up',
            'client_birthday_greeting',
            'staff_agenda',
        ),
        'combined' => array(
            'client_pending_appointment_cart',
            'client_approved_appointment_cart',
        ),
    );

    public $gateway;

    /**
     * Constructor.
     *
     * @param string $gateway
     */
    public function __construct( $gateway = 'email' )
    {
        /*
         * make Visual Mode as default (instead of Text Mode)
         * allowed: tinymce - Visual Mode, html - Text Mode, test - no one Mode selected
         */
        add_filter( 'wp_default_editor', create_function( '', 'return \'tinymce\';' ) );
        $this->types   = Lib\Proxy\Shared::prepareNotificationTypes( $this->types );
        $this->gateway = $gateway;
        if ( ! Lib\Config::combinedNotificationsEnabled() ) {
            $this->types['combined'] = array();
        }
        $this->setFields( array( 'active', 'subject', 'message', 'copy', ) );
        $this->load();
    }

    public function bind( array $_post = array(), array $files = array() )
    {
        foreach ( $this->types as $group ) {
            foreach ( $group as $type ) {
                foreach ( $this->fields as $field ) {
                    if ( isset ( $_post[ $type ] [ $field ] ) ) {
                        $this->data[ $type ][ $field ] = $_post[ $type ][ $field ];
                    }
                }
            }
        }
    }

    /**
     * Save form.
     */
    public function save()
    {
        /** @var Lib\Entities\Notification[] $notifications */
        $notifications = Lib\Entities\Notification::query( 'n' )
            ->where( 'gateway', $this->gateway )
            ->indexBy( 'type' )
            ->find();
        foreach ( $this->types as $group ) {
            foreach ( $group as $type ) {
                $notifications[ $type ]->setFields( $this->data[ $type ] );
                $notifications[ $type ]->save();
            }
        }
    }

    public function load()
    {
        $notifications = Lib\Entities\Notification::query( 'n' )
            ->select( 'active, subject, message, copy, type' )
            ->where( 'gateway', $this->gateway )
            ->indexBy( 'type' )
            ->fetchArray();
        foreach ( $this->types as $group ) {
            foreach ( $group as $type ) {
                $notifications[ $type ]['name'] = Lib\Entities\Notification::getName( $type );
                $this->data[ $type ] = $notifications[ $type ];
            }
        }
    }

    /**
     * Render subject.
     *
     * @param string $type
     */
    public function renderSubject( $type )
    {
        printf(
            '<div class="form-group">
                <label for="%1$s">%2$s</label>
                <input type="text" class="form-control" id="%1$s" name="%3$s" value="%4$s" />
            </div>',
            $type . '_subject',
            __( 'Subject', 'bookly' ),
            $type . '[subject]',
            esc_attr( $this->data[ $type ]['subject'] )
        );
    }

    /**
     * Render message editor.
     *
     * @param string $type
     */
    public function renderEditor( $type )
    {
        $id    = $type . '_message';
        $name  = $type . '[message]';
        $value = $this->data[ $type ]['message'];

        if ( $this->gateway == 'sms' ) {
            printf(
                '<div class="form-group">
                    <label for="%1$s">%2$s</label>
                    <textarea rows="6" id="%1$s" name="%3$s" class="form-control">%4$s</textarea>
                </div>',
                $id,
                __( 'Message', 'bookly' ),
                $name,
                esc_textarea( $value )
            );
        } else {
            $settings = array(
                'textarea_name' => $name,
                'media_buttons' => false,
                'editor_height' => 384,
                'tinymce'       => array(
                    'theme_advanced_buttons1' => 'formatselect,|,bold,italic,underline,|,'.
                                                 'bullist,blockquote,|,justifyleft,justifycenter'.
                                                 ',justifyright,justifyfull,|,link,unlink,|'.
                                                 ',spellchecker,wp_fullscreen,wp_adv'
                )
            );

            echo '<div class="form-group"><label>' . __( 'Message', 'bookly' ) . '</label>';
            wp_editor( $value, $id, $settings );
            echo '</div>';
        }
    }

    /**
     * Render copy.
     *
     * @param string $type
     */
    public function renderCopy( $type )
    {
        if ( in_array( $type, array( 'staff_pending_appointment', 'staff_approved_appointment', 'staff_cancelled_appointment', 'staff_rejected_appointment', 'staff_pending_recurring_appointment', 'staff_approved_recurring_appointment', 'staff_cancelled_recurring_appointment' ) ) ) {
            printf(
                '<div class="form-group">
                    <input name="%1$s" type="hidden" value="0">
                    <div class="checkbox"><label for="%2$s"><input id="%2$s" name="%1$s" type="checkbox" value="1" %3$s> %4$s</label></div>
                </div>',
                $type . '[copy]',
                $type . '_copy',
                checked( $this->data[ $type ]['copy'], true, false ),
                __( 'Send copy to administrators', 'bookly' )
            );
        }
    }

    /**
     * Render sending time.
     *
     * @param string $type
     */
    public function renderSendingTime( $type )
    {
        if ( in_array( $type, array( 'staff_agenda', 'client_follow_up', 'client_reminder', 'client_reminder_1st', 'client_reminder_2nd', 'client_reminder_3rd', 'client_birthday_greeting' ) ) ) {
            $cron_reminder = (array) get_option( 'bookly_cron_reminder_times' );
            $before_hour = strpos( $type, 'client_reminder_' ) !== false;
            $data = array(
                $before_hour ? $type . '_cron_before_hour' : $type . '_cron_hour',
                __( 'Sending time', 'bookly' ),
                __( 'Set the time you want the notification to be sent.', 'bookly' ),
            );
            if ( $before_hour ) {
                $data[] = implode( '', array_map( function ( $hour ) use ( $type, $cron_reminder ) {
                    return sprintf(
                        '<option value="%s" %s>%s</option>',
                        $hour,
                        selected( $cron_reminder[ $type ], $hour, false ),
                        sprintf( __( '%s before', 'bookly' ), \Bookly\Lib\Utils\DateTime::secondsToInterval( $hour * HOUR_IN_SECONDS ) )
                    );
                }, array_merge( range( 1, 24 ), range( 48, 336, 24 ) ) ) );
            } else {
                $data[] = implode( '', array_map( function ( $hour ) use ( $type, $cron_reminder ) {
                    return sprintf(
                        '<option value="%s" %s>%s</option>',
                        $hour,
                        selected( $cron_reminder[ $type ], $hour, false ),
                        Lib\Utils\DateTime::buildTimeString( $hour * HOUR_IN_SECONDS, false )
                    );
                }, range( 0, 23 ) ) );
            }

            vprintf(
                '<div class="form-group">
                    <label for="%1$s">%2$s</label>
                    <p class="help-block">%3$s</p>
                    <select class="form-control" name="%1$s" id="%1$s">
                        %4$s
                    </select>
                </div>',
                $data
            );
        }
    }

}