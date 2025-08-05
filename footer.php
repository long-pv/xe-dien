<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xe_dien
 */

?>
</main>
<!-- end main body -->

<footer class="footer">
    <div class="container">
        <div>
            <a href="<?php echo home_url(); ?>" class="logo">
                <?php $logo_url = get_template_directory_uri() . '/assets/images/logo.svg'; ?>
                <img src="<?php echo $logo_url; ?>" alt="logo">
            </a>
        </div>
        <div class="footer_menu">
            <div class="row">
                <div class="col-lg-3">
                    <div class="item">
                        <div class="title">
                            Sản phẩm
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    <a href="#">Xe bán chạy</a>
                                </li>
                                <li>
                                    <a href="#">Xe thời thượng</a>
                                </li>
                                <li>
                                    <a href="#">Mua xe</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <div class="title">
                            Dịch vụ
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    <a href="#">Thay pin</a>
                                </li>
                                <li>
                                    <a href="#">Phụ tùng & Phụ kiện chính hãng</a>
                                </li>
                                <li>
                                    <a href="#">Bảo trì</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <div class="title">
                            Giới thiệu
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    <a href="#">VinFast Đức Nghĩa</a>
                                </li>
                                <li>
                                    <a href="#">Giới thiệu VinFast</a>
                                </li>
                                <li>
                                    <a href="#">Tuyển dụng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="item">
                        <div class="title">
                            Liên hệ
                        </div>
                        <div class="content">
                            <ul>
                                <li>
                                    Email: vinfastducnghia@gmail.com
                                </li>
                                <li>
                                    Hotline: 0968718446
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="social">
                        <a href="#" class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30 16.0502C30 23.276 24.6 29.1971 17.7 30V19.1613H21L21.5 15.3477H17.8V13.0394C17.8 11.9355 18.1 11.233 19.7 11.233H21.7V7.72043C20.7 7.62007 19.8 7.62007 18.8 7.62007C15.9 7.62007 13.9 9.42652 13.9 12.638V15.448H10.6V19.2617H13.9V30C7.1 28.8961 2 23.0753 2 16.0502C2 8.32258 8.3 2 16 2C23.7 2 30 8.32258 30 16.0502Z" fill="black" fill-opacity="0.8" />
                            </svg>
                        </a>
                        <a href="#" class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0035 2H15.9965C8.27725 2 2 8.279 2 16C2 19.0625 2.987 21.901 4.66525 24.2057L2.9205 29.4067L8.30175 27.6865C10.5155 29.153 13.1562 30 16.0035 30C23.7227 30 30 23.7192 30 16C30 8.28075 23.7227 2 16.0035 2ZM24.1497 21.7698C23.812 22.7235 22.4715 23.5145 21.4023 23.7455C20.6707 23.9012 19.7153 24.0255 16.4987 22.692C12.3845 20.9875 9.735 16.8067 9.5285 16.5355C9.33075 16.2642 7.866 14.3218 7.866 12.3127C7.866 10.3038 8.88625 9.3255 9.2975 8.9055C9.63525 8.56075 10.1935 8.40325 10.729 8.40325C10.9023 8.40325 11.058 8.412 11.198 8.419C11.6093 8.4365 11.8158 8.461 12.087 9.11025C12.4248 9.924 13.2472 11.933 13.3452 12.1395C13.445 12.346 13.5448 12.626 13.4048 12.8973C13.2735 13.1773 13.158 13.3015 12.9515 13.5395C12.745 13.7775 12.549 13.9595 12.3425 14.215C12.1535 14.4373 11.94 14.6753 12.178 15.0865C12.416 15.489 13.2385 16.8312 14.4495 17.9092C16.0122 19.3005 17.2792 19.745 17.7325 19.934C18.0702 20.074 18.4727 20.0408 18.7195 19.7783C19.0327 19.4405 19.4195 18.8805 19.8132 18.3293C20.0933 17.9338 20.4468 17.8847 20.8178 18.0247C21.1958 18.156 23.196 19.1447 23.6073 19.3495C24.0185 19.556 24.2897 19.654 24.3895 19.8273C24.4875 20.0005 24.4875 20.8142 24.1497 21.7698Z" fill="black" fill-opacity="0.8" />
                            </svg>
                        </a>
                        <a href="#" class="icon">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.82603 3.94452C6.16032 1.52416 8.75398 2.05091 20.5858 2.0451C23.9212 2.05092 24.052 2.07885 24.702 2.17303C27.5387 2.58127 29.6921 4.59659 29.9667 8.09393C30.0039 8.56141 30.0037 23.4336 29.9676 23.8967C29.7094 27.1801 27.8204 29.0633 25.4989 29.6623C23.7596 30.1124 8.33276 30.112 6.59165 29.6642C1.0162 28.2231 2.08186 22.1023 2.08189 15.9963C2.08189 8.64345 1.63265 6.22295 3.82603 3.94452ZM16.0331 5.69452C11.811 5.69434 7.80178 5.32088 6.27036 9.25116C5.63768 10.8748 5.73032 12.9838 5.73032 16.0031C5.73032 18.6523 5.64485 21.1423 6.27036 22.7531C7.79866 26.6867 11.8423 26.3098 16.034 26.3098C20.078 26.3098 24.2473 26.7308 25.7977 22.7531C26.4315 21.1132 26.3387 19.0362 26.3387 16.0031C26.3387 11.9765 26.5611 9.37665 24.6083 7.42499C22.6313 5.44802 19.9576 5.69445 16.0331 5.69452ZM15.1122 7.55292C23.9213 7.53896 25.0434 6.55989 24.4247 20.1642C24.2048 24.9759 20.5404 24.4484 16.037 24.4484C7.82589 24.4484 7.5897 24.213 7.5897 15.9982C7.5897 7.68824 8.24111 7.55795 15.1122 7.55096V7.55292ZM16.036 10.7101C15.341 10.7102 14.6527 10.8465 14.0106 11.1125C13.3686 11.3785 12.7852 11.7685 12.2938 12.2599C11.3013 13.2526 10.7438 14.5994 10.744 16.0031C10.7442 17.4067 11.3021 18.7529 12.2948 19.7453C13.2874 20.7376 14.6334 21.2952 16.037 21.2951C17.4406 21.2949 18.7867 20.7369 19.7792 19.7443C20.7715 18.7517 21.329 17.4057 21.329 16.0021C21.3288 14.5986 20.7716 13.2524 19.7792 12.2599C18.7865 11.2675 17.4397 10.71 16.036 10.7101ZM16.036 12.5676C20.5778 12.5676 20.5837 19.4387 16.036 19.4387C11.4955 19.4385 11.4885 12.5677 16.036 12.5676ZM21.5379 9.26385C21.21 9.26385 20.8948 9.3943 20.6629 9.62616C20.4312 9.85795 20.3017 10.1724 20.3016 10.5002C20.3016 10.8279 20.4313 11.1424 20.6629 11.3742C20.8948 11.6061 21.21 11.7365 21.5379 11.7365C21.8657 11.7364 22.1802 11.606 22.412 11.3742C22.6436 11.1424 22.7743 10.8279 22.7743 10.5002C22.7742 10.1724 22.6437 9.85796 22.412 9.62616C22.1802 9.39439 21.8657 9.26396 21.5379 9.26385Z" fill="black" fill-opacity="0.8" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="content">
                        <h2>Công ty TNHH Kinh doanh Thương mại và Dịch vụ VinFast</h2>
                        <p>
                            <b>MST/MSDN:</b> 0108926276 do Sở KHĐT TP Hà Nội cấp lần đầu ngày 01/10/2019 và các lần thay đổi tiếp theo.
                        </p>
                        <p>
                            <b>Địa chỉ trụ sở chính:</b> Số 576, đường Lạc Long Quân, phường Phú Thượng, Quận Tây Hồ, Thành phố Hà Nội, Việt Nam
                        </p>
                    </div>
                    <div class="copyright">
                        © Copyright 2025. All rights Reserved
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex justify-content-end">
                        <a href="#" class="icon">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_2.png'; ?>" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>