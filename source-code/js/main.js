    $(document).ready(function () {
        var imageData = null;
        var lastMessageId = 0; // ID của tin nhắn cuối cùng được lấy
        var currentUsername =
            '<?php echo addslashes($_SESSION["username"]); ?>'; // Lấy tên người dùng từ PHP session

        // Xử lý sự kiện kéo và thả, dán hình ảnh, và chọn tệp
        setupDragAndDrop();
        setupPasteImage();
        setupFileSelect();

        // Gửi tin nhắn khi nhấn enter hoặc nhấp vào nút gửi
        setupMessageSending();

        // Lấy tin nhắn mới mỗi 5 giây
        setInterval(fetchNewMessages, 5000);

        function setupDragAndDrop() {
            $('#chat-input, .chat-box').on('dragover', function (event) {
                event.preventDefault();
            }).on('drop', function (event) {
                event.preventDefault();
                handleImageDrop(event.originalEvent.dataTransfer.files);
            });
        }

        function setupPasteImage() {
            $('#chat-input').on('paste', function (event) {
                var items = (event.clipboardData || event.originalEvent.clipboardData).items;
                for (var index in items) {
                    var item = items[index];
                    if (item.kind === 'file' && item.type.startsWith('image/')) {
                        handleImage(item.getAsFile());
                    }
                }
            });
        }

        function setupFileSelect() {
            $('#image').on('change', function () {
                if (this.files && this.files[0]) {
                    handleImage(this.files[0]);
                }
            });
        }

        function setupMessageSending() {
            $('#send-message').click(sendMessage);
            $('#chat-input').keypress(function (e) {
                if (e.which == 13 && !e.shiftKey) {
                    e.preventDefault();
                    sendMessage();
                }
            });
        }



        function handleImage(file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                imageData = e.target.result; // Chuyển file hình ảnh thành base64
            };
            reader.readAsDataURL(file);
        }

        function sendMessage() {
            var messageContent = $('#chat-input').text().trim();
            if (messageContent.length === 0 && !imageData) {
                return; // Không gửi tin nhắn nếu không có nội dung hoặc hình ảnh
            }

            var formData = new FormData();
            formData.append('message', messageContent);
            if (imageData) {
                formData.append('imageData', imageData);
                imageData = null; // Reset imageData sau khi gửi
            }

            $.ajax({
                url: 'send_message.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function () {
                    $('#chat-input').html(''); // Xóa nội dung nhập vào sau khi gửi
                    fetchNewMessages(); // Gọi tin nhắn mới ngay sau khi gửi thành công
                },
                error: function () {
                    alert('Có lỗi xảy ra khi gửi tin nhắn.');
                }
            });
        }



        function fetchNewMessages() {
            $.ajax({
                url: 'fetch_new_messages.php',
                type: 'GET',
                dataType: 'json',
                data: {
                    lastMessageId: lastMessageId
                },
                success: updateChatBox,
                error: function (xhr, status, error) {
                    console.error("Error fetching new messages:", status, error);
                }
            });
        }

        function updateChatBox(messages) {
            if (!messages || !messages.length) return;

            messages.forEach(function (message) {
                if (message.sender_username && message.id) {
                    var isMyMessage = message.sender_username.trim().toLowerCase() === currentUsername
                        .trim().toLowerCase();
                    var messageClass = isMyMessage ? 'my-message' : 'friend-message';
                    var messageSender = isMyMessage ? 'Me' : message.sender_username;
                    var escapedMessage = $('<div>').text(message.message).html();
                    var messageElement = $('<div>').addClass('message ' + messageClass).html(
                        `<strong>${messageSender}:</strong> ${escapedMessage}`
                    );
                    $('#chat-box').append(messageElement);
                    lastMessageId = Math.max(lastMessageId, message.id);
                }
            });


            $('#chat-box').scrollTop($('#chat-box')[0].scrollHeight);


        }


    });