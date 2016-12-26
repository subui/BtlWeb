(function () {
    var Message;
    Message = function (arg) {
        this.text = arg.text, this.message_side = arg.message_side, this.name = arg.name;
        this.draw = function (_this) {
            return function () {
                var $message;
                $message = $($('.message_template').clone().html());
                $message.addClass(_this.message_side).find('.text').html(_this.text);
                $message.find('.avatar').html(_this.name);
                $('.messages').append($message);
                return setTimeout(function () {
                    return $message.addClass('appeared');
                }, 0);
            };
        }(this);
        return this;
    };
    $(function () {
        var getMessageText, message_side, sendMessage;
        message_side = 'left';
        getMessageText = function () {
            var $message_input;
            $message_input = $('.message_input');
            return $message_input.val();
        };
        sendMessage = function (text) {
            var $messages, message;
            if (text.trim() === '') {
                return;
            }
            $('.message_input').val('');
            $messages = $('.messages');
            message = new Message({
                text: text,
                message_side: 'right',
                name: 'Bạn'
            });
            message.draw();
            $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 0);

            $.ajax('chat/chat.php?message=' + text)
                .done(function(msg) {
                    if (msg === '') {
                        return;
                    }
                    $messages = $('.messages');
                    message = new Message({
                        text: msg,
                        message_side: 'left',
                        name: 'QTV'
                    });
                    message.draw();
                    return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 0);
                });

        };
        $('.send_message').click(function (e) {
            return sendMessage(getMessageText());
        });
        $('.message_input').keyup(function (e) {
            if (e.which === 13) {
                return sendMessage(getMessageText());
            }
        });

        return setInterval(() => {
            $.ajax('chat/chat.php?get=')
                .done((msg) => {
                    if (msg === '') {
                        return;
                    }
                    $messages = $('.messages');
                    message = new Message({
                        text: msg,
                        message_side: 'left',
                        name: 'QTV'
                    });
                    message.draw();
                    return $messages.animate({ scrollTop: $messages.prop('scrollHeight') }, 0);
                });
        }, 100);
    });
}.call(this));
