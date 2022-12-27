<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
// use URL;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('Frontend.index');
    }

    public function sendMail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' =>'required',
            'email' => 'required|email',
            'messages' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('mail')
                ->withErrors($validator)
                ->withInput();
        }

        $header_url = URL::to('/') . "/public/assets/images/email_header.jpg";
        // $footer_url = URL::to('/')."/public/assets/images/email_footer.png";
        $email_header = "<img src=" . $header_url . " >";


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('testetste');
        if ($user->save()) {
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

            // if($user){
            //     $status['status'] = true;
            //     $status['message'] = "You have successfully registered, please check your Email id";
            //     return redirect()->route('mail')->with('success','ss');

            // }else{
            //     $status['status'] = false;
            //     $status['message'] = "Something went wrong";
            //     return redirect()->route('mail')->with('error','ss');

            // }
        }
    }
}
