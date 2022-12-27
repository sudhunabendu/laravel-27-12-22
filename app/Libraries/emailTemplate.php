<?php

namespace App\Libraries;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

class emailTemplate
{
    public function template($user){

        $header_url = URL::to('/') . "/public/assets/images/email_header.jpg";
        // $footer_url = URL::to('/')."/public/assets/images/email_footer.png";
        $email_header = "<img src=" . $header_url . " >";

        $template_body_user  = "<table border='0' cellpadding='0' cellspacing='0' style='width:650px; background-color:#ffffff; margin:0px; padding:0px;'>" . $email_header . "
        <tbody>
            <tr style='width:650px; margin:0px; padding:0px;'>
                <td style='width:610px; margin:0px; padding:0px 20px; '>
                <table border='0' cellpadding='0' cellspacing='0' style='width:610px; margin:0px; padding:0px;'><!-- hello user -->
                    <tbody>
                        <tr style='width:610px; margin:0px; padding:0px;'>
                            <td style='width:610px; margin:0px; padding:0px;'>
                            <table style='width:610px; margin:0px; padding:0px; '>
                                <tbody>
                                    <tr style='width:610px; margin:0px; padding:0px;'>
                                        <td style='width:610px; margin:0px; padding:0px 0px 12px 0px;'>
                                        <p style='float:left; width: 610px; font-family: 'verdana'; font-size: 14px; color: #444444; margin:0px; padding:0px;'>Hello " . $user['name'] . ",</p>
                                        </td>
                                    </tr>
                                    <tr style='width:610px; margin:0px; padding:0px;'>
                                        <td style='width:610px; margin:0px; padding:0px 0px 8px 0px;'>
                                        <p style='float:left; width: 610px; font-family: 'verdana'; font-size: 13px; color: #444444; margin:0px; padding:0px;'>Thank you for connecting with us. Your account will be activated soon.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </td>
            </tr>
            <tr>
            <td style='background: #f94144;padding: 25px 20px;text-align: center;color: #fff;font-size: 14px;'>© CLEANING EXPERT " . date("Y") . " ALL RIGHTS RESERVED</td>
        </tr>
        </tbody>
    </table>";
        $template_subject_user = "Thank you for your Registration as Customer";


        $values['template_body_user']    = $template_body_user;
        $email_user  = $user['email'];
        $name_user  = $user['name'];

        Mail::send('emails.new_register_vendor', $values, function ($message) use ($email_user, $name_user, $template_subject_user){
            $message->from('admin@lvinfosolution.com', 'Ecommerce Website');
            $message->to($email_user,$name_user);
            $message->subject($template_subject_user);
        });
    }
}
