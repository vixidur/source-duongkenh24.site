<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@2.1.0/css/boxicons.min.css">
    <link rel="icon" href="../img/LOGO-DKN-VER2.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="./css/index.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        img[src="https://www.000webhost.com/static/default.000webhost.com/images/powered-by-000webhost.png"] {
            display: none;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            height: 100%;
            width: 78px;
            background: #11101d;
            padding: 6px 14px;
            z-index: 99;
            transition: all 0.5s ease;
        }

        .sidebar.open {
            width: 250px;
        }

        .sidebar .logo-details {
            height: 60px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .sidebar .logo-details .icon {
            opacity: 0;
            transition: all 0.5s ease;
        }

        .sidebar .logo-details .logo_name {
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            opacity: 0;
            transition: all 0.5s ease;
        }

        .sidebar.open .logo-details .icon,
        .sidebar.open .logo-details .logo_name {
            opacity: 1;
        }

        .sidebar .logo-details #btn {
            background-color: #11101d;
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            font-size: 22px;
            transition: all 0.4s ease;
            font-size: 23px;
            text-align: center;
            cursor: pointer;
            transition: all 0.5s ease;
        }

        .sidebar.open .logo-details #btn {
            text-align: right;
        }

        .sidebar i {
            color: #fff;
            height: 60px;
            min-width: 50px;
            font-size: 28px;
            text-align: center;
            line-height: 60px;
        }

        .sidebar .nav-list {
            margin-top: 20px;
            height: 100%;
        }

        .sidebar li {
            position: relative;
            margin: 8px 0;
            list-style: none;
        }

        .sidebar li .tooltip {
            position: absolute;
            top: -20px;
            left: calc(100% + 15px);
            z-index: 3;
            background: #fff;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 15px;
            font-weight: 400;
            opacity: 0;
            white-space: nowrap;
            pointer-events: none;
            transition: 0s;
        }

        .sidebar li:hover .tooltip {
            opacity: 1;
            pointer-events: auto;
            transition: all 0.4s ease;
            top: 50%;
            transform: translateY(-50%);
        }

        .sidebar.open li .tooltip {
            display: none;
        }

        .sidebar input {
            font-size: 15px;
            color: #fff;
            font-weight: 400;
            outline: none;
            height: 50px;
            width: 100%;
            width: 50px;
            border: none;
            border-radius: 12px;
            transition: all 0.5s ease;
            background: #1d1b31;
        }

        .sidebar.open input {
            padding: 0 20px 0 50px;
            width: 100%;
        }

        .sidebar .bx-search {
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            font-size: 22px;
            background: #1d1b31;
            color: #fff;
        }

        .sidebar.open .bx-search:hover {
            background: #1d1b31;
            color: #fff;
        }

        .sidebar .bx-search:hover {
            background: #fff;
            color: #11101d;
        }

        .sidebar li a {
            display: flex;
            height: 100%;
            width: 100%;
            border-radius: 12px;
            align-items: center;
            text-decoration: none;
            transition: all 0.4s ease;
            background: #11101d;
        }

        .sidebar li a:hover {
            background: #fff;
        }

        .sidebar li a .links_name {
            color: #fff;
            font-size: 15px;
            font-weight: 400;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: 0.4s;
        }

        .sidebar.open li a .links_name {
            opacity: 1;
            pointer-events: auto;
        }

        .sidebar li a:hover .links_name,
        .sidebar li a:hover i {
            transition: all 0.5s ease;
            color: #11101d;
        }

        .sidebar li i {
            height: 50px;
            line-height: 50px;
            font-size: 18px;
            border-radius: 12px;
        }

        .sidebar li.profile {
            position: fixed;
            height: 60px;
            width: 78px;
            left: 0;
            bottom: -8px;
            padding: 10px 14px;
            background: #1d1b31;
            transition: all 0.5s ease;
            overflow: hidden;
        }

        .sidebar.open li.profile {
            width: 250px;
        }

        .sidebar li .profile-details {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;
        }

        .sidebar li.profile .name,
        .sidebar li.profile .job {
            font-size: 15px;
            font-weight: 400;
            color: #fff;
            white-space: nowrap;
        }

        .sidebar li.profile .job {
            font-size: 12px;
        }

        .sidebar .profile #log_out {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            background: #1d1b31;
            width: 100%;
            height: 60px;
            line-height: 60px;
            border-radius: 0px;
            transition: all 0.5s ease;
        }

        .sidebar.open .profile #log_out {
            width: 50px;
            background: none;
        }

        .home-section {
            position: relative;
            background: #e4e9f7;
            min-height: 100vh;
            top: 0;
            left: 78px;
            width: calc(100% - 78px);
            transition: all 0.5s ease;
            z-index: 2;
        }

        .home-section .text {
            display: inline-block;
            color: #11101d;
            font-size: 25px;
            font-weight: 500;
            margin: 18px;
        }

        @media (max-width: 420px) {
            .sidebar li .tooltip {
                display: none;
            }
        }

        .logout-link {
            color: white;
            background-color: #11101d;
        }

        .logout-link:hover {
            background-color: #11101d;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo-img">
                <img src="./img/LOGO-DKN-VER2.png" alt="" width="20px" height="20px"
                    style="position: relative; margin-right: 20px; z-index: -99999">
            </div>
            <div class="logo_name">DUONGKENH</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>
        <ul class="nav-list">
            <li>
                <i class='bx bx-search'></i>
                <input type="text" placeholder="Search...">
                <span class="tooltip">Search</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-home-alt'></i>
                    <span class="links_name">Trang chủ</span>
                </a>
                <span class="tooltip">Trang chủ</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Bạn bè</span>
                </a>
                <span class="tooltip">Bạn bè</span>
            </li>
            <li>
                <a href="./vn-room-chat/login.php">
                    <i class='bx bx-chat'></i>
                    <span class="links_name">Chat Box</span>
                </a>
                <span class="tooltip">Chat Box</span>
            </li>
            <li>
                <a href="./learnresponsive">
                    <i class='bx bx-spa'></i>
                    <span class="links_name">Du lịch</span>
                </a>
                <span class="tooltip">Du lịch</span>
            </li>
            <!-- <li class="profile">
                <div class="profile-details">
                    <i class='bx bx-export'></i>
                    <div class="name_job">
                        <div class="name"><a href="./logout.php" class="logout-link">Logout</a></div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li> -->
        </ul>
    </div>
    <section class="home-section">
        <h1>Đường Kênh News</h1>
        <div class="container">
            <?php

            // Giả sử danh sách tin tức được lấy từ cơ sở dữ liệu
            $news = [
                [
                    "title" => "Trần Văn Chiến",
                    "content" => "
                                                            <em>Nhiệt tình, tự tin và thân thiện</em> là ba từ tôi muốn mô tả về bản thân. 
                                                            Sự nhiệt tình của tôi đối với công việc của một lập trình viên cho phép tôi duy 
                                                            trì động lực trong công việc và nhận thấy tầm quan trọng những gì tôi 
                                                            đang làm. <b><em>Sự tự tin giúp tôi nhận ra khả năng của mình</em></b> . Tôi cũng 
                                                            nghĩ mình là một người <b>cực kỳ thân thiện</b>, vì tôi thích 
                                                            tương tác với khách hàng cũng như đồng nghiệp của mình mỗi ngày.
                                                        ",
                    "image" => "img/avt1.jpg"
                ],
                [
                    "title" => "Phạm Trần Anh",
                    "content" => "
                                                        Tôi là người <b>có tổ chức, kiên nhẫn và đáng tin cậy.</b> Tôi tự hào về <em>kỹ năng quản lý 
                                                        thời gian của mình</em> và khả năng đáp ứng những lịch trình bất ngờ. <em><b>Khi tôi gặp 
                                                        khó khăn, tôi không bỏ cuộc.</b></em> Thay vào đó, tôi sẽ kiên nhẫn và tiếp tục 
                                                        làm việc cho đến khi tôi đạt được kết quả. Cuối cùng, tôi chọn từ đáng tin 
                                                        cậy vì tôi luôn tuân thủ các cam kết của mình. Nếu tôi tình nguyện làm 
                                                        điều gì đó, bạn có thể đảm bảo rằng <b>tôi sẽ hoàn thành nó với khả năng 
                                                        tốt nhất của mình.</b>
                                                    ",
                    "image" => "img/avt2.jpg"
                ],
                [
                    "title" => "Võ Quốc Việt",
                    "content" => "
                                                        Từ đầu tiên tôi dùng để mô tả về bản thân là <b>dễ gần</b>. Thực tế, khi gặp gỡ khách 
                                                        hàng tôi luôn cố gắng hết sức để họ cảm thấy thoải mái trong quá trình 
                                                        hỗ trợ và giải đáp thắc mắc cho họ. Tôi cũng là một người khá tinh ý. 
                                                        <b><em>Tôi cố gắng để ý tới những chi tiết nhỏ mà người khác có thể không nhận 
                                                        thấy.</em></b>
                                                        Cuối cùng, tôi là người ham học hỏi. Trong công việc, tôi thường hay học 
                                                        hỏi các cách làm việc của đồng nghiệp nếu cảm thấy cách làm của mình không 
                                                        thực sự tốt. <b>Tôi thích thử các cách tiếp cận và rèn luyện kỹ năng mới để phục 
                                                        vụ khách hàng được tốt hơn.</b>
                                                    ",
                    "image" => "img/avt3.jpg"
                ],
                [
                    "title" => "Lê Thiện Nguyên",
                    "content" => "
                                                            Tính cách của tôi có thể được mô tả bằng ba từ: <i><b>chủ động, kiên nhẫn 
                                                            và sáng tạo.</b></i> Tôi là người luôn chủ động trong mọi tình huống, 
                                                            không ngần ngại tiếp cận và giải quyết vấn đề. <b>Khả năng kiên nhẫn 
                                                            của tôi giúp tôi vượt qua những thử thách</b> một cách <u>bền bỉ</u> và <u>không 
                                                            từ bỏ dễ dàng.</u> Đồng thời, với <b>tinh thần sáng tạo</b>, tôi thích 
                                                            tìm kiếm cách tiếp cận vấn đề từ các góc độ mới, <i>tạo ra những 
                                                            giải pháp độc đáo và hiệu quả.</i> Những phẩm chất 
                                                            này đã giúp tôi không chỉ tự 
                                                            phát triển mà còn đóng góp tích cực trong mọi môi trường làm việc.
                                                        ",
                    "image" => "img/avt4.jpg"
                ],
                [
                    "title" => "Tô Hoàng Vũ",
                    "content" => "
                                                        Tôi là <u>người chủ động</u>, <u>kiên nhẫn</u> và <u>sáng tạo</u>. Tôi luôn tích 
                                                        cực tiếp cận và giải quyết vấn đề, <b>không bao giờ từ bỏ trước những thử 
                                                        thách</b>. Với tinh thần sáng tạo, tôi luôn tìm 
                                                        cách tiếp cận vấn đề từ góc độ mới, tạo ra những giải 
                                                        pháp độc đáo và hiệu quả.",
                    "image" => "img/avt5.jpg"
                ],
                [
                    "title" => "Nguyễn Hữu Phúc Thịnh",
                    "content" => "
                                                                <b>Tính cách kiên định</b> của tôi thường được <u>thể hiện qua sự 
                                                                cam kết</u> và <u>sự kiên trì</u> trong mọi công việc. Dù gặp phải khó 
                                                                khăn và thách thức, <b><i>tôi luôn 
                                                                cố gắng và không bao giờ từ bỏ mục tiêu của mình.</i></b> Tôi 
                                                                tin rằng bằng sự kiên định và nỗ lực, mọi khó khăn đều có 
                                                                thể vượt qua.
                                                            ",
                    "image" => "img/avt6.jpg"
                ],
                [
                    "title" => "Nguyễn Học Nam",
                    "content" => "
                                                            Tôi có thể mô tả bản thân bằng ba từ: <u>nhiệt huyết</u>, <u>linh 
                                                            hoạt</u> và <u>tận tụy</u>. Sự nhiệt huyết luôn là động lực lớn nhất 
                                                            của tôi trong mọi hoạt động. Tôi luôn đam mê và tận hưởng mỗi khía cạnh 
                                                            của cuộc sống và công việc. Sự nhiệt huyết giúp <b>tôi không ngừng 
                                                            khám phá</b>, <b>học hỏi</b> và <b>phát triển bản thân</b>, cũng như 
                                                            tạo ra sự <b>lan tỏa tích cực trong môi trường xung quanh.</b>
                                                        ",
                    "image" => "img/avt7.jpg"
                ],
                [
                    "title" => "Nguyễn Thị Quỳnh Nga",
                    "content" => "
                                                                <b>Sự chăm chỉ là nguồn động lực không ngừng của tôi.</b> Tôi tin 
                                                                rằng không có công việc nào là quá khó khăn nếu ta đặt vào đó đủ sự 
                                                                cống hiến và chăm chỉ. Tôi luôn cam kết làm việc hết mình, <b>không 
                                                                ngừng học hỏi và hoàn thiện bản thân để đạt được mục tiêu</b> đề ra. 
                                                                Đối với tôi, sự chăm chỉ không chỉ là một phẩm chất cá nhân mà còn 
                                                                là <u>chìa khóa dẫn đến thành công và sự phát triển trong cuộc sống 
                                                                và sự nghiệp.</u>
                                                            ",
                    "image" => "img/avt8.jpg"
                ],
                [
                    "title" => "Lê Thuỳ Linh",
                    "content" => "
                                                        <b>Niềm đam mê với nhảy nhót</b> là <u>nguồn cảm hứng không ngừng của 
                                                        tôi</u>, và <b>tôi luôn tích cực tìm kiếm cơ hội để thể hiện niềm đam 
                                                        mê này.</b> <i>Bằng sự quyết tâm và lòng say mê không ngừng, tôi không 
                                                        chỉ tìm cách phát triển kỹ năng nhảy mà còn lan tỏa sự nhiệt huyết đến 
                                                        những người xung quanh.</i> Tôi luôn đặt ra những mục tiêu rõ ràng và 
                                                        làm việc chăm chỉ để đạt được chúng, không ngừng khích lệ bản thân và 
                                                        người khác. <b>Sự tích cực của tôi không chỉ giới hạn trong lĩnh vực nhảy 
                                                        nhót mà còn lan tỏa vào mọi khía cạnh của cuộc sống, giúp tôi vượt qua mọi 
                                                        thách thức và đạt được những thành công đáng kể.</b>
                                                    ",
                    "image" => "img/avt9.jpg"
                ],
                // Thêm các tin tức khác tương tự ở đây
            ];

            // Hiển thị tin tức
            foreach ($news as $index => $article) {
                // Tạo đường dẫn đến trang HTML tương ứng
                $htmlPagePath = "./INFO-MEMBER/info" . ($index + 1) . ".html";

                echo '<div class="article">';
                echo '<span class="avatar"><img src="' . $article['image'] . '" alt="Avatar"></span>';
                echo '<div class="content">';
                // Tạo liên kết với trang HTML tương ứng
                echo '<h2><a href="' . $htmlPagePath . '">' . $article['title'] . '</a></h2>';
                echo '<p>' . $article['content'] . '</p>';
                echo '</div>'; // Kết thúc nội dung tin tức
                echo '</div>'; // Kết thúc bài báo
            }

            ?>
        </div>
        <!-- Phần footer -->
        <footer class="footer">
            <div class="footer-content">
                <div class="logo">
                    <h3>TƯ VẤN TUYỂN SINH</h3>
                    <p>Trần Văn Chiến - 0862587229 - chien@541duongkenh.site</p>
                    <p>Lê Thuỳ Linh - 0123456798 - linh@541duongkenh.site</p>
                    <p>Nguyễn Thị Quỳnh Nga - 0123456789 - nga@541duongkenh.site</p>
                    <h3>TƯ VẤN ĐÀO TẠO DOANH NGHIỆP</h3>
                    <p>Võ Quốc Việt - 0382416368 - viet@541duongkenh.site</p>
                </div>
                <div class="info">
                    <h3>ĐỊA CHỈ</h3>
                    <p>Địa chỉ: 541 Đường Kênh - Nam Định</p>
                    <p>Số điện thoại: 0862587229</p>
                    <p>Thành viên nhóm</p>
                    <div class="avatars">
                        <?php
                        // Tạo ra các thẻ <img> chứa avatar của thành viên và sắp xếp cạnh nhau
                        for ($i = 1; $i <= 9; $i++) {
                            echo '<div class="avatar-container">';
                            echo '<img src="img/avt' . $i . '.jpg" alt="Avatar ' . $i . '" class="avatar">';
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <div class="ownerwebsite">
                    <h3>Chủ sở hữu Website</h3>
                    <p>Founder/CEO Trần Văn Chiến</p>
                    <p>Số ĐKDN: 0105392153</p>
                    <p>Ngày cấp: 4-7-2011</p>
                    <p>Nơi cấp: Sở kế hoạch - đầu tư Hà nội</p>
                    <p>Người đại diện pháp luật: Võ Quốc Việt</p>
                </div>
                <div class="about">
                    <h3>Giới Thiệu</h3>
                    <p>Học viện CNTT TechMaster</p>
                    <p>Giảng viên</p>
                    <p>Quy định</p>
                    <p>Hướng dẫn mua khóa học</p>
                    <p>Ưu đãi và hoàn trả học phí</p>
                    <p>Bảo vệ thông tin khách hàng</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2024 Đường Kênh News. All Rights Reserved.</p>
            </div>
        </footer>
        <style>
            a {
                color: black;
                list-style: none;
                text-decoration: none;
            }

            a:hover {
                color: red;
            }

            /* Định dạng thanh cuộn dọc */
            ::-webkit-scrollbar {
                width: 1px;
                /* Chiều rộng của thanh cuộn */
            }

            /* Định dạng nút cuộn */
            ::-webkit-scrollbar-thumb {
                background-color: #0baae7;
                /* Màu của nút cuộn */
                border-radius: 5px;
                /* Bo góc của nút cuộn */
            }

            /* Định dạng khi di chuột vào nút cuộn */
            ::-webkit-scrollbar-thumb:hover {
                background-color: #0688BC;
                /* Màu của nút cuộn khi di chuột vào */
            }

            /* Định dạng phần footer */
            .footer {
                background-color: #30598c;
                /* Đường dẫn đến hình ảnh background */
                background-size: cover;
                background-position: center;
                color: #fff;
                padding: 50px 0;
            }

            .footer-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
                /* max-width: 1200px; */
                margin: 0 auto;
            }

            .logo img {
                width: 100px;
                /* Định kích thước của logo */
            }

            .copyright p {
                margin-top: 40px;
                font-size: 20px;
            }

            .info p {
                margin: 5px 0;
            }

            .info a {
                color: #fff;
            }

            /* Định dạng cho phần nội dung chính giữa footer */
            .info,
            .logo,
            .copyright,
            .ownerwebsite,
            .about {
                /* flex: 1; */
                text-align: center;
            }

            /* Định dạng cho phần thông tin bản quyền ở giữa */
            .copyright p {
                font-size: 14px;
            }

            .avatars {
                box-sizing: border-box;
                ;
                display: flex;
                justify-content: center;
            }

            .avatar-container {
                margin: 0 10px;
                /* Khoảng cách giữa các avatar */
            }

            .bx-log-out {
                cursor: pointer;
                /* Thiết lập con trỏ chuột thành hình bàn tay khi trỏ vào */
            }

            @media (max-width: 768px) {
                .avatar-container {
                    box-sizing: border-box;
                    width: 10px;
                    height: 80px;
                }

                .footer-content {
                    display: flex;
                    flex-direction: column;
                    /* height: 80px; */
                }
            }
        </style>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var logoutButton = document.querySelector(".bx-log-out");
            if (logoutButton) {
                logoutButton.addEventListener("click", function () {
                    window.location.href = "./logout.php";
                });
            }
        });

        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");
        let searchBtn = document.querySelector(".bx-search");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();
        });

        searchBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            menuBtnChange();
        });

        function menuBtnChange() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        }
    </script>
</body>

</html>