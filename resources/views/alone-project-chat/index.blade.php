<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html">
		<meta name="viewport" content="width=device-width, initial-scale=1"> {{-- Есть в бутстрапе --}}

		<?php	#    !!! Придумать как убрать в отдельный файл !!!

			/**
			 * Мои глобальные настройки для всего проекта
			 * Можно переопределять эти переменные в нужных view
			 *
			 * Этот файл подключается в /.php
			 * Скорее всего это не самое удачное место для include
			 */

			# Игнорировать ли отсутствие в списках?
			$ignore_title_not_found = false;

			# Потом оставить заглушки с сигнатурой переменных, что бы не вспоминать
			# Если нужно, то можно будет переопределять эти переменные на конкретных страницах.

			# Сделать норм имена переменных

			$Favicon_path = "/favicon";
			$Css_path     = "/s-script";

			$Libs_path_common  = "/libs/common";
			$Libs_path_my      = "/libs/my";
			$Libs_path_dev     = "/libs/dev";
			$Libs_path_project = "/libs-project";

			# Смотреть полный список в папке frontend/fonts     NOSTYLE
			$PROJECT_FONTS = array(
			"CDN-GF# main #Roboto      #400,700#cyrillic#sans-serif",
			"CDN-GF#   1  #Open+Sans   #400,700#cyrillic#sans-serif",
			"CDN-GF#   2  #Montserrat  #400,700#cyrillic#sans-serif",
			"CDN-GF# NOSTYLE #Merriweather#400,700#cyrillic#serif",    );

			# !!! Смотреть полый список в папке frontend/css-selectable   # Возможные значения не всегда актуальны
			$PROJECT_SELECTABLE_CSS = array(
				"text-sel-color" => "1",   # 0 1 2
				"scrollbar"      => "1",   # 0 1 2 ftc
				"body-bg-color"  => "1",   # 0 1 2 3
				"link-a-color"   => "1",   # 0 1
				"brk-colors"     => "ftc"  ); # ftc(дефолт)

			# echo session('referal_code');
			# получить рефку если есть.  работает
			# Потом выводить это значение в форме
			# И выводить в форме - найден ли реф в базе
		?>

		{{-- Тут лежат ВСЕ Title Description Keywords для ВСЕХ страниц. Все в одном файле. --}}
        <title>Онлайн-Чат без регистрации.</title>
        <meta name="description" content="Онлайн-Чат без регистрации"/>
        <meta name="keywords" content=""/>



		{{-- Весь хедер для всего проекта подключается в одном файле. --}}
		{{-- Если надо что-то менять для конкретной страницы - копипастить все оттуда и менять тут руками. --}}
		@include('head-univ.ALL_INCLUDER')


		{{-- Подключение общих библиотек и индивидуальных, только для этой страницы. --}}
		{{--@include('for-all-pages--head-end')--}}

        <style>

            h1,h2,h3,h4,h5,h6
            {
                margin: 0;
            }

            #row_banner
            {
                height: 10vh;
            }

            #row_form
            {
                height: 10vh;
            }

            input
            {
                height: 45px;
                border-radius: 20px;
            }

            #textinput_name
            {
                text-align: center;
                width: 10%;
            }

            #textinput_msg
            {
                padding-inline-start: 30px;
                width: 50%;
            }

            #row_footer
            {
                height: 10vh;
            }
            /* ############ */

            .grad-35 				 { background-image: linear-gradient(45deg, #2A9EFF, #FF4968); }
            .grad-cyan-dark-green 	 { background-image: linear-gradient(45deg, #0097a7, #b2ff59); }
            .grad-purple-deep-orange { background-image: linear-gradient(45deg, #8e24aa, #ff6e40); }
            .grad-plum 				 { background-image: linear-gradient(45deg, #e35c67, #381ce2); }
            .grad-passion-fruit		 { background-image: linear-gradient(45deg, #8137F7, #F6AB3E); }
            .grad-sublime-vivid 	 { background-image: linear-gradient(45deg, #FC466B, #3F5EFB); }

        </style>

        <style>


            table.result_table td:nth-child(1) { width: 5%; }
            table.result_table td:nth-child(2) { width: 15%; }
            table.result_table td:nth-child(3) { width: 15%; }
            table.result_table td:nth-child(4) { width: 65%; }



            table.result_table {
                border: 2px solid #1C6EA4;
                background-color: #EEEEEE;
                width: 100%;
                text-align: center;
                border-collapse: collapse;
            }


            table.result_table td, table.result_table th {
                border: 1px solid #AAAAAA;
                padding: 3px 2px;
            }

            table.result_table tbody td {
                font-size: 14px;
            }

            table.result_table tbody tr   /* Высота строк */
            {
                height: 45px;
            }

            table.result_table tr:nth-child(even) {
                background: #D0E4F5;
            }


            table.result_table thead {
                font-size: 20px;
                background: #1C6EA4;
                background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
                background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
                background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
                border-bottom: 2px solid #444444;
            }

            table.result_table thead th {

                font-weight: bold;
                color: #FFFFFF;
                text-align: center;
                border-left: 2px solid #D0E4F5;
            }

            table.result_table thead th:first-child {
                border-left: none;
            }

        </style>

        @php
        $arr_gradients = Array( "grad-35" , "grad-cyan-dark-green" , "grad-purple-deep-orange" , "grad-plum" , "grad-passion-fruit" , "grad-sublime-vivid" );
        $target_grad = $arr_gradients[array_rand( $arr_gradients , 1 )];
        @endphp

	</head>
	<body class="<?php echo $target_grad; ?>">

        <div class="container-fluid  ">

            <!-- Banner -->
            <div id="row_banner" class="row  text-center">
                <div  class="col-12 m-auto ">
                    <h2>Online-Chat</h2>
                </div>
            </div>
            <!-- Banner -->

            <!-- Форма -->
            <div id="row_form" class="row text-center">
                <div class="col-md-10 m-auto ">

                    {!! Form::open(['url'=>route('chat.addmsg'), 'id'=>'form_get_tbl', 'method'=>'POST']) !!}

                        <div class="form-inline " style="display: block; ">

                            <input id="textinput_name" class="form-control" name="author_nickname" type="text"
                                   placeholder="Логин" size="20"
                                   value="{{old('author_nickname')}}" >

                            <input id="textinput_msg" class="form-control" name="message" type="text"
                                   placeholder="Сообщение" size="80"
                                   value="{{old('message')}}" >

                            <button class="btn btn-success">Отправить</button>

                            <a href="{{route('chat.index')}}">
                                <button class="btn btn-danger" type="button">Обновить</button>
                            </a>

                        </div>

                    {!! Form::close() !!}

                </div>
            </div>
            <!-- /Форма -->

            @if($errors->any())
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10 m-auto">
                            <div class="alert alert-danger">
                                <ul class="m-auto">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Таблица -->
                <div class="row">

                    <div class="col-md-10 col-md-offset-1 m-auto" style="padding-top: 30px;">
                        <table class="result_table">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Время</td>
                                <td>Автор</td>
                                <td>Сообщение</td>
                                @if( $admin_token )
                                    <td>Удалить</td>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($all_messages as $msg)
                                <tr>
                                    <td>{{$msg->id}}</td>
                                    <td>{{$msg->created_at}}</td>
                                    <td>{{$msg->author_nickname}}</td>
                                    <td>{{$msg->message}}</td>

                                    @if( $admin_token )
                                        <td>
                                            {!! Form::open(['route'=>['chat.delete',$msg->id,$admin_token], "method"=>'DELETE']) !!}
                                            <button onclick="return confirm('Удалить?');" class="btn btn-danger">
                                                Удалить
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    @endif

                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            <!-- /Таблица -->

            <!-- Футер -->
                <div id="row_footer" class="row  text-center">
                    <div  class="col-12 m-auto ">
                        <h4>https://github.com/Azerlund6214/Laravel-OnlineChat</h4>
                    </div>
                </div>
            <!-- Футер -->

        </div>
	</body>
</html>
