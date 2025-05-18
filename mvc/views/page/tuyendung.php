<head>
    <style>
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 10px;
}

.chir_breadcrumb {
    padding: 8px 0;
    font-size: 12px;
    color: #666;
}

/* Grid system */
.grid-uniform {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -5px;
}

.grid__item {
    padding: 5px;
    box-sizing: border-box;
}

.large--one-half {
    width: 50%;
}

/* Square article items - Đảm bảo hiển thị ảnh */
.article-item {
    display: flex;
    flex-direction: column;
    height: 0;
    padding-bottom: 100%; /* Tạo tỷ lệ 1:1 */
    position: relative;
    border: 1px solid #e0e0e0;
    border-radius: 6px;
    overflow: hidden;
    transition: all 0.2s ease;
    background: #fff;
}

.article-content {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
}

/* Phần ảnh - Đảm bảo hiển thị đầy đủ */
.article-img {
    flex: 0 0 60%;
    overflow: hidden;
    position: relative; /* Thêm position relative */
    min-height: 450px; /* Đặt chiều cao tối thiểu */
}

.article-img a {
    display: block;
    width: 100%;
    height: 100%;
}

.article-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center; /* Đảm bảo ảnh căn giữa */
    display: block; /* Thêm display block */
    transition: transform 0.3s ease;
}

/* Phần còn lại giữ nguyên */
.article-info-wrapper {
    flex: 1;
    padding: 8px;
    display: flex;
    flex-direction: column;
}

.article-title {
    margin-bottom: 5px;
}

.article-title a {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    text-decoration: none;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    line-height: 1.3;
}

.article-desc {
    font-size: 12px;
    color: #666;
    line-height: 1.3;
    margin-bottom: 8px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    flex: 1;
}

.article-info {
    display: flex;
    font-size: 10px;
    color: #999;
    margin-top: auto;
    padding-top: 6px;
    border-top: 1px dashed #eee;
}

.article-date,
.article-author,
.article-comment {
    display: flex;
    align-items: center;
    margin-right: 8px;
}

.article-date svg,
.article-author svg,
.article-comment svg {
    margin-right: 3px;
    width: 10px;
    height: 10px;
}

/* Hiệu ứng hover */
.article-item:hover {
    transform: scale(1.02);
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

.article-item:hover .article-img img {
    transform: scale(1.05);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .large--one-half {
        width: 50%;
    }
    
    .article-img {
        min-height: 120px; /* Điều chỉnh cho tablet */
    }
}

@media (max-width: 480px) {
    .large--one-half {
        width: 100%;
    }
    
    .article-item {
        padding-bottom: 120%;
    }
    
    .article-img {
        flex: 0 0 50%;
        min-height: 100px; /* Điều chỉnh cho mobile */
    }
}
    </style>
</head>
<div class="container">
    <div class="chir_breadcrumb">
        <a href="">Trang chủ</a>
        <span>/Tuyển dụng</span>
    </div>
    <div class="grid__item large--nine-twelfths medium--one-whole small--one-whole">
        <div class="blog-content">
            <div class="blog-content-wrapper">
                <div class="blog-head">
                    <div class="blog-title">
                        <h1>Tuyển dụng</h1>                       
                    </div>
                </div>
                <div class="blog-body">
                    <div class="grid-uniform"> 
                        <div class="grid__item large--one-half medium--one-half small--one-whole">
                            <div class="article-item">
                                <div class="article-img">
                                    <a href="pages/tuyendung/tuyen-cong-tac-vien">
                                        <img src="//file.hstatic.net/1000373675/article/15648779566_2907806160629268480_n_a03bae65c58141a19bb24ddb1d130180_eba56f64aba7448b960f26134ba50c1b_large.jpg" alt="TUYỂN CỘNG TÁC VIÊN">
                                    </a>
                                </div>
	                            <div class="article-info-wrapper">
                                    <div class="article-title">
                                        <a href="pages/tuyendung/tuyen-cong-tac-vien">TUYỂN CỘNG TÁC VIÊN</a>
                                    </div>
                                    <div class="article-desc">			
                                        TUYỂN CỘNG TÁC VIÊNDo nhu cầu mở rộng quy mô sản xuất, Minh Long book cần tuyển thêm nhân lực cho các vị trí sau:1. CTV truyền thông- Lên kế hoạch truyền thông cho các sản phẩm ...		
                                    </div>
                                    <div class="article-info">
                                        <div class="article-date">
                                            <svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M436 160H12c-6.6 0-12-5.4-12-12v-36c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48v36c0 6.6-5.4 12-12 12zM12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm116 204c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40z"></path></svg><!-- <i class="fas fa-calendar-alt"></i> --> 20/09/19
                                        </div>
                                        <div class="article-author">
                                            <svg class="svg-inline--fa fa-user fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 0c88.366 0 160 71.634 160 160s-71.634 160-160 160S96 248.366 96 160 167.634 0 256 0zm183.283 333.821l-71.313-17.828c-74.923 53.89-165.738 41.864-223.94 0l-71.313 17.828C29.981 344.505 0 382.903 0 426.955V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48v-37.045c0-44.052-29.981-82.45-72.717-93.134z"></path></svg><!-- <i class="fas fa-user"></i> --> Truyền thông Minh Long
                                        </div>
                                        <div class="article-comment">
                                            <svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M224 358.857c-37.599 0-73.027-6.763-104.143-18.7-31.375 24.549-69.869 39.508-110.764 43.796a8.632 8.632 0 0 1-.89.047c-3.736 0-7.111-2.498-8.017-6.061-.98-3.961 2.088-6.399 5.126-9.305 15.017-14.439 33.222-25.79 40.342-74.297C17.015 266.886 0 232.622 0 195.429 0 105.16 100.297 32 224 32s224 73.159 224 163.429c-.001 90.332-100.297 163.428-224 163.428zm347.067 107.174c-13.944-13.127-30.849-23.446-37.46-67.543 68.808-64.568 52.171-156.935-37.674-207.065.031 1.334.066 2.667.066 4.006 0 122.493-129.583 216.394-284.252 211.222 38.121 30.961 93.989 50.492 156.252 50.492 34.914 0 67.811-6.148 96.704-17 29.134 22.317 64.878 35.916 102.853 39.814 3.786.395 7.363-1.973 8.27-5.467.911-3.601-1.938-5.817-4.759-8.459z"></path></svg><!-- <i class="fas fa-comments"></i> --> <span class="fb-comments-count fb_comments_count_zero_fluid_desktop" data-href="https://www.minhlongbook.com.vn/blogs/tuyen-dung/tuyen-cong-tac-vien" fb-xfbml-state="parsed" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;count=true&amp;height=100&amp;href=https%3A%2F%2Fwww.minhlongbook.com.vn%2Fblogs%2Ftuyen-dung%2Ftuyen-cong-tac-vien&amp;locale=vi_VN&amp;sdk=joey&amp;version=v2.11&amp;width=550"><span class="fb_comments_count">0</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid__item large--one-half medium--one-half small--one-whole">
                            <div class="article-item">
                                <div class="article-img">
                                    <a href="pages/tuyendung/tuyen-dung-nhan-vien-truyen-thong">
                                        <img src="//file.hstatic.net/1000373675/article/378238783307_490578109511237632_n_11740109664546fea223475e9ac41320_2d535168f931492893084ee9c48c098a_large.jpg" alt="TUYỂN DỤNG NHÂN VIÊN TRUYỀN THÔNG">
                                    </a>
                                </div>
                                <div class="article-info-wrapper">
                                    <div class="article-title">
                                        <a href="pages/tuyendung/tuyen-dung-nhan-vien-truyen-thong">TUYỂN DỤNG NHÂN VIÊN TRUYỀN THÔNG</a>
                                    </div>
                                    <div class="article-desc">                                       
                                        TUYỂN NHÂN VIÊN TRUYỀN THÔNG Do nhu cầu mở rộng quy mô sản xuất, Minh Long book cần tuyển thêm nhân lực cho vị trí sau:1. Nhân viên truyền thông&nbsp;- Số lượng cần tuyển: 05 ngư...                                       
                                    </div>
                                    <div class="article-info">
                                        <div class="article-date">
                                            <svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M436 160H12c-6.6 0-12-5.4-12-12v-36c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48v36c0 6.6-5.4 12-12 12zM12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm116 204c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40z"></path></svg><!-- <i class="fas fa-calendar-alt"></i> --> 20/09/19
                                        </div>
                                        <div class="article-author">
                                            <svg class="svg-inline--fa fa-user fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 0c88.366 0 160 71.634 160 160s-71.634 160-160 160S96 248.366 96 160 167.634 0 256 0zm183.283 333.821l-71.313-17.828c-74.923 53.89-165.738 41.864-223.94 0l-71.313 17.828C29.981 344.505 0 382.903 0 426.955V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48v-37.045c0-44.052-29.981-82.45-72.717-93.134z"></path></svg><!-- <i class="fas fa-user"></i> --> Truyền thông Minh Long
                                        </div>
                                        <div class="article-comment">
                                            <svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M224 358.857c-37.599 0-73.027-6.763-104.143-18.7-31.375 24.549-69.869 39.508-110.764 43.796a8.632 8.632 0 0 1-.89.047c-3.736 0-7.111-2.498-8.017-6.061-.98-3.961 2.088-6.399 5.126-9.305 15.017-14.439 33.222-25.79 40.342-74.297C17.015 266.886 0 232.622 0 195.429 0 105.16 100.297 32 224 32s224 73.159 224 163.429c-.001 90.332-100.297 163.428-224 163.428zm347.067 107.174c-13.944-13.127-30.849-23.446-37.46-67.543 68.808-64.568 52.171-156.935-37.674-207.065.031 1.334.066 2.667.066 4.006 0 122.493-129.583 216.394-284.252 211.222 38.121 30.961 93.989 50.492 156.252 50.492 34.914 0 67.811-6.148 96.704-17 29.134 22.317 64.878 35.916 102.853 39.814 3.786.395 7.363-1.973 8.27-5.467.911-3.601-1.938-5.817-4.759-8.459z"></path></svg><!-- <i class="fas fa-comments"></i> --> <span class="fb-comments-count fb_comments_count_zero_fluid_desktop" data-href="https://www.minhlongbook.com.vn/blogs/tuyen-dung/tuyen-dung-nhan-vien-truyen-thong" fb-xfbml-state="parsed" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;count=true&amp;height=100&amp;href=https%3A%2F%2Fwww.minhlongbook.com.vn%2Fblogs%2Ftuyen-dung%2Ftuyen-dung-nhan-vien-truyen-thong&amp;locale=vi_VN&amp;sdk=joey&amp;version=v2.11&amp;width=550"><span class="fb_comments_count">0</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>								
						<div class="grid__item large--one-half medium--one-half small--one-whole">
							<div class="article-item">
                                <div class="article-img">
                                    <a href="pages/tuyendung/tuyen-dung-ctv-thiet-ke-bia-sach">
                                        <img src="//file.hstatic.net/1000373675/article/51989112598_4756899867727495168_n_be90feffe9ad45869a57cebfb9d3ed95_88ce87df28334696acb068742dfbb7b7_large.jpg" alt="TUYỂN DỤNG CTV THIẾT KẾ BÌA SÁCH">
                                    </a>
                                </div>
                                    <div class="article-info-wrapper">
                                        <div class="article-title">
                                            <a href="pages/tuyendung/tuyen-dung-ctv-thiet-ke-bia-sach">TUYỂN DỤNG CTV THIẾT KẾ BÌA SÁCH</a>
                                        </div>
                                        <div class="article-desc">			
                                            Do nhu cầu mở rộng quy mô sản xuất, Minh Long book cần tuyển thêm nhân lực cho vị trí CTV Thiết kế bìa sách.Mô tả công việc:1. Công việc:- Thiết kế bìa sách, bookmark; móc khóa-...		
                                        </div>
                                        <div class="article-info">
                                            <div class="article-date">
                                                <svg class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" data-prefix="fas" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M436 160H12c-6.6 0-12-5.4-12-12v-36c0-26.5 21.5-48 48-48h48V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h128V12c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v52h48c26.5 0 48 21.5 48 48v36c0 6.6-5.4 12-12 12zM12 192h424c6.6 0 12 5.4 12 12v260c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V204c0-6.6 5.4-12 12-12zm116 204c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12H76c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm128 128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40zm0-128c0-6.6-5.4-12-12-12h-40c-6.6 0-12 5.4-12 12v40c0 6.6 5.4 12 12 12h40c6.6 0 12-5.4 12-12v-40z"></path></svg><!-- <i class="fas fa-calendar-alt"></i> --> 20/09/19
                                            </div>
                                            <div class="article-author">
                                                <svg class="svg-inline--fa fa-user fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M256 0c88.366 0 160 71.634 160 160s-71.634 160-160 160S96 248.366 96 160 167.634 0 256 0zm183.283 333.821l-71.313-17.828c-74.923 53.89-165.738 41.864-223.94 0l-71.313 17.828C29.981 344.505 0 382.903 0 426.955V464c0 26.51 21.49 48 48 48h416c26.51 0 48-21.49 48-48v-37.045c0-44.052-29.981-82.45-72.717-93.134z"></path></svg><!-- <i class="fas fa-user"></i> --> Truyền thông Minh Long
                                            </div>
                                            <div class="article-comment">
                                                <svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M224 358.857c-37.599 0-73.027-6.763-104.143-18.7-31.375 24.549-69.869 39.508-110.764 43.796a8.632 8.632 0 0 1-.89.047c-3.736 0-7.111-2.498-8.017-6.061-.98-3.961 2.088-6.399 5.126-9.305 15.017-14.439 33.222-25.79 40.342-74.297C17.015 266.886 0 232.622 0 195.429 0 105.16 100.297 32 224 32s224 73.159 224 163.429c-.001 90.332-100.297 163.428-224 163.428zm347.067 107.174c-13.944-13.127-30.849-23.446-37.46-67.543 68.808-64.568 52.171-156.935-37.674-207.065.031 1.334.066 2.667.066 4.006 0 122.493-129.583 216.394-284.252 211.222 38.121 30.961 93.989 50.492 156.252 50.492 34.914 0 67.811-6.148 96.704-17 29.134 22.317 64.878 35.916 102.853 39.814 3.786.395 7.363-1.973 8.27-5.467.911-3.601-1.938-5.817-4.759-8.459z"></path></svg><!-- <i class="fas fa-comments"></i> --> <span class="fb-comments-count fb_comments_count_zero_fluid_desktop" data-href="https://www.minhlongbook.com.vn/blogs/tuyen-dung/tuyen-dung-ctv-thiet-ke-bia-sach" fb-xfbml-state="parsed" fb-iframe-plugin-query="app_id=&amp;container_width=0&amp;count=true&amp;height=100&amp;href=https%3A%2F%2Fwww.minhlongbook.com.vn%2Fblogs%2Ftuyen-dung%2Ftuyen-dung-ctv-thiet-ke-bia-sach&amp;locale=vi_VN&amp;sdk=joey&amp;version=v2.11&amp;width=550"><span class="fb_comments_count">0</span></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>	
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
