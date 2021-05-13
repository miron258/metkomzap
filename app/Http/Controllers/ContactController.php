<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactController extends Controller {

    public function saveCallback(Request $request) {

        $params = $request->all(); //Все данные с инпутов формы
        $validation = Validator::make($params, [
                    'name' => 'required',
                    'phone' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                        'success' => false,
                        'messages' => $validation->errors(),
                            ], 200);
        } else {
            $contact = new Contact;
            $contact->name = $params['name'];
            $contact->phone = $params['phone'];
            $contact->type_form = 'callback';
            $contact->save();



            //Формируем объект сообщения
            $message = array();
            $message['subject'] = "Форма обратной связи";
            $message['name'] = $params['name'];
            $message['phone'] = $params['phone'];



            //Отправляем сообщения на почту менеджеру
            $this->sendMail($message, 'message-callback');



            return response()->json([
                        'success' => true,
                        'messageText' => $message,
                        'message' => 'Спасибо за заказ звонка.',
                        'form' => '',
                            ], 200);
        }
    }

    public function saveQuickOrder(Request $request) {
        $params = $request->all(); //Все данные с инпутов формы
        $validation = Validator::make($params, [
                    'phone' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                        'success' => false,
                        'errors' => $validation->errors(),
                        'message' => 'Форма не отправлена'
                            ], 200);
        } else {
            $contact = new Contact;
            $contact->phone = isset($params['phone']) ? $params['phone'] : '';
            $contact->type_form = 'quickorder';
            $contact->name = isset($params['name']) ? $params['name'] : ''; //Название и артикул товар на который поступил быстрый заказ
            $contact->save();


            //Формируем объект сообщения
            $message = array();
            $message['subject'] = "Форма быстрого заказа товара";
            $message['name'] = $params['name'];
            $message['phone'] = $params['phone'];
            //Отправляем сообщения на почту менеджеру
            $this->sendMail($message, 'message-quickorder');



            return response()->json([
                        'success' => true,
                        'message' => 'Спасибо за заказ, наш менеджер<br> свяжется с Вами в ближайшее время.',
                        'form' => '',
                            ], 200);
        }
    }

    public function saveAskQuestion(Request $request) {
        $params = $request->all(); //Все данные с инпутов формы
        $validation = Validator::make($params, [
                    'email' => 'required|email|unique:contacts,email',
                    'phone' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                        'success' => false,
                        'errors' => $validation->errors(),
                        'message' => 'Форма не отправлена'
                            ], 200);
        } else {
            $contact = new Contact;
            $contact->phone = isset($params['phone']) ? $params['phone'] : '';
            $contact->email = isset($params['email']) ? $params['email'] : '';
            $contact->type_form = 'askquestion';
            $contact->save();


            //Формируем объект сообщения
            $message = array();
            $message['subject'] = "Форма вопроса";
            $message['email'] = $params['email'];
            $message['phone'] = $params['phone'];
            //Отправляем сообщения на почту менеджеру
            $this->sendMail($message, 'message-askquestion');



            return response()->json([
                        'success' => true,
                        'message' => 'Спасибо за заказ, наш менеджер свяжется с Вами в ближайшее время.',
                        'form' => '',
                            ], 200);
        }
    }

    protected function sendMail($message = '', $template = 'message-callback') {
        Mail::send("emails.{$template}", $message, function ($m) {
            $m->from('info@metkom57.ru', 'Метком Запчасти');
            $m->to('miron258@yandex.ru', 'Метком запчасти')->subject("Заказ с формы сайта");
//            $m->cc('metkom57@mail.ru', '');
        });
    }

}
