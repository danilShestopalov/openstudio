@extends('layouts.app')

@section('content')
    <section class="error404">
		<img class="yula" src="img/yula.png">
		<img class="twocirc" src="img/twocirc.png">
        <div class="errortext">
            <h1>Присоединяйся к нам</h1>
            <p>Получите неограниченный доступ ко всем профилям и покорите мир своим стартапом</p>
            <button id="payment" onclick="pay()">Присоединяйся</button>
        </div>
    </section>
@endsection

<script>
    this.pay = function () {
        var widget = new cp.CloudPayments();
        var data = {};
        data.cloudPayments = {
            recurrent : {
                interval : 'Month',
                period : 1
            }
        }; //создание ежемесячной подписки
        widget.charge({ // options
                publicId : 'pk_b63e3f230c8d35532d5a2bf2955ac', //id из личного кабинета
                description : 'Подключение подписки', //назначение
                amount : 300, //сумма
                currency : 'KZT', //валюта

                // accountId : 'user@example.com', //идентификатор плательщика (необязательно)
                data : data,
            },
            function (options) { // success
                alert('Оплата успешно проведена')
            },
            function (reason, options) { // fail
                alert(reason)
            });
    };
</script>
