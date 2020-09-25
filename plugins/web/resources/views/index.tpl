<{extends file="extends/main.block.tpl"}>
<{include file="[web]common/title.inc.tpl"}>
<{block "head-styles"}>
    <{include file="[web]common/styles.inc.tpl"}>
    <{/block}>
<{block "head-styles-plus"}><link rel="stylesheet" href="<{'web/css/index.css'|static}>"><{/block}>

<{block "body-container"}>
    <{include file="[web]common/header.inc.tpl"}>
    <div class="banner">
        <div class="swiper-container partner_box" id="banner">
            <ul class="swiper-wrapper">
                <li class="swiper-slide">
                    <img src="<{'web/images/banner.png'|static}>" alt="" class="">
                    <div class="box">
                        <div class="banner_box">
                            <div class="left_box banner_01 fadeInLeft animated">
                                <div class="top">
                                    <h2>游戏聊天广告智能识别系统</h2>
                                    <p>广告秒封、保证用户留存、提升游戏体验</p>
                                </div>
                                <div class="bottom">
                                    <h2>游戏聊天防拉人专家</h2>
                                    <p>7*24小时、人工+智能、超低成本、超高收益</p>
                                </div>
                            </div>
                            <div class="right_box banner_02 fadeInRight animated" id="scroll_div">
                                <div class="banner_02_box" id="scroll_begin">
                                    <a class="tag1 animat0">首冲三折起</a>
                                    <a class="tag2 animat1">加微信送豪礼</a>
                                    <a class="tag1 animat2">小哥哥结婚吗</a>
                                    <a class="tag2 animat3">月卡免费送</a>
                                    <a class="tag1 animat4">福利群</a>
                                    <a class="tag2 animat5">BT游戏上线满V</a>
                                    <a class="tag2 animat6">元宝1:600在线等</a>
                                    <a class="tag1 animat7">加VX，IOS退款</a>
                                </div>
                                <div id="scroll_end">

                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </li>
                <li class="swiper-slide">
                    <img src="<{'web/images/banner_04.png'|static}>" alt="">
                    <div class="box">
                        <div class="banner_box">
                            <div class="left_box banner_03">
                                <div class="top">
                                    <h2>天眼平台</h2>
                                    <p class="text1">全球领先的大数据智能科技平台</p>
                                    <p class="text2">版本升级,只为更好的服务</p>
                                    <em class="line"></em>
                                </div>
                            </div>
                            <div class="right_box banner_04"></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </li>
            </ul>
            <a href="javascript:void(0);" class="video_btn">视频演示</a>

            <div class="clear"></div>
        </div>
        <div class="swiper-pagination"></div><!--分页器。如果放置在swiper-container外面，需要自定义样式。-->

    </div>

    <div class="speclal" id="speclal_function">
        <div class="box">
            <p class="en_title"><img src="<{'web/images/function_icon.png'|static}>" width="390" alt="22"></p>
            <p class="zn_title">功能介绍</p>
            <p class="module_detail">以游戏内聊天广告识别和封禁为核心，<br/>防止用户流失，提升游戏体验。同时兼顾识别封禁政治敏感、恶意刷屏、黄色信息等违规言论
            </p>
            <ul>
                <li>
                    <img src="<{'web/images/zz_icon.png'|static}>" alt="" class="function_icon">
                    <p class="title">政治敏感</p>
                    <em></em>
                    <p class="detail">识别文本中的涉政敏感、反动等不良信息</p>
                </li>
                <li>
                    <img src="<{'web/images/eysp_icon.png'|static}>" alt="" class="function_icon">
                    <p class="title">恶意刷屏</p>
                    <em></em>
                    <p class="detail">识别文本中无意字符或乱码等特征的刷屏内容</p>
                </li>
                <li>
                    <img src="<{'web/images/znjh_icon.png'|static}>" alt="" class="function_icon">
                    <p class="title">智能鉴黄</p>
                    <em></em>
                    <p class="detail">识别文本中不合网络规范的色情内容</p>
                </li>
                <li>
                    <img src="<{'web/images/bkwj_icon.png'|static}>" alt="" class="function_icon">
                    <p class="title">暴恐违禁</p>
                    <em></em>
                    <p class="detail">识别文本中国家法律限制的暴恐、赌博、毒品等违法违规内容</p>
                </li>
                <li>
                    <img src="<{'web/images/eytg_icon.png'|static}>" alt="" class="function_icon">
                    <p class="title">恶意推广</p>
                    <em></em>
                    <p class="detail">识别文本中拉人广告、代充、IOS退款、卖元宝等不合规内容</p>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="core" id="core_technology">
        <div class="box">
            <div class="title_box">
                <p class="en_title"><img src="<{'web/images/core_title.png'|static}>" width="390" alt="22"></p>
                <p class="zn_title">核心技术特点</p>
                <p class="module_detail">综合运用NLP自然语言处理、<br/>AI深度强化学习、高频动态变化文本实时分类、用户行为数据挖掘等技术，结合人工7*24小时保驾护航
                </p>
            </div>
            <ul>
                <li>
                    <img src="<{'web/images/index_08.png'|static}>" alt="" width="350" height="440">
                    <div class="text">
                        <p class="">
                            <span>舆情安保</span>
                            <em></em>
                            <span>Public opinion security</span>
                        </p>
                    </div>

                    <div class="shade">
                        <p>
                            <strong>01</strong>
                            <span>实时监控</span>
                            <span>四重防护</span>
                        </p>
                    </div>
                </li>
                <li>
                    <img src="<{'web/images/index_09.png'|static}>" alt="" width="350" height="440">
                    <div class="text">
                        <p>
                            <span>大数据计算</span>
                            <em></em>
                            <span>Big data computing</span>
                        </p>
                    </div>
                    <div class="shade">
                        <p>
                            <strong>02</strong>
                            <span>数据模型</span>
                            <span>AI智能</span>
                            <span>黑名单</span>
                            <span>1000W/天</span>
                        </p>
                    </div>
                </li>
                <li>
                    <img src="<{'web/images/index_10.png'|static}>" alt="" width="350" height="440">
                    <div class="text">
                        <p>
                            <span>热词查询</span>
                            <em></em>
                            <span>Hot word query</span>
                        </p>
                    </div>
                    <div class="shade">
                        <p>
                            <strong>03</strong>
                            <span>搜索 "组队"</span>
                            <span>搜索 "活动"</span>
                            <span>搜索 "角色"</span>
                        </p>
                    </div>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
    <div class="about" id="contact_us">
        <div class="box">
            <div class="title">
                <img src="<{'web/images/about_title.png'|static}>" alt="title" width="455" height="90">
            </div>
            <div class="about_box">
                <div class="left_box">
                    <img src="<{'web/images/about.jpg'|static}>" alt="" width="498" height="335">
                    <p class="sq"></p>
                </div>
                <div class="right_box">
                    <p class="title">武汉游侠游戏</p>
                    <p class="detail">
                        武汉游侠游戏科技有限公司成立于2014年9月份，是由多名业内精英创办的一家移动互联网公司，目标是成为中国领先的移动游戏服务商。
                        <br/>
                        在这里：汇聚微软、百度、腾讯、联想、Kabam、昆仑万维、龙图游戏、华为等行业顶尖人才的团队优势;具备成功产品的研发运营经验，公司凭借与腾讯、网易、中国手游、完美世界的大力合作，已经成为了国内移动游戏服务的知名企业。
                    </p>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="partner" id="cooperative">
        <div class="box">
            <p class="en_title"><img src="<{'web/images/partner_title.png'|static}>" alt=""></p>
            <p class="detail">
                口碑传播已成为游戏天眼最好的宣传途径，<br/>合作伙伴无不对效果交口称赞。目前已接入腾讯系、君海系等多款游戏
            </p>
            <div class="swiper-container partner_box" id="swiper2">
                <ul class="swiper-wrapper">
                    <li class="swiper-slide"><img src="<{'web/images/wx.png'|static}>" alt=""/></li>
                    <li class="swiper-slide"><img src="<{'web/images/sp.png'|static}>" alt=""/></li>
                    <li class="swiper-slide"><img src="<{'web/images/hx.png'|static}>" alt=""/></li>
                    <li class="swiper-slide"><img src="<{'web/images/21.png'|static}>" alt=""/></li>
                    <li class="swiper-slide"><img src="<{'web/images/22.png'|static}>" alt=""/></li>
                    <li class="swiper-slide"><img src="<{'web/images/23.png'|static}>" alt=""/></li>
                    <li class="swiper-slide"><img src="<{'web/images/24.png'|static}>" alt="" width="200" height="120"></li>
                    <li class="swiper-slide"><img src="<{'web/images/25.png'|static}>" alt=""/></li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="swiper-pagination"></div><!--分页器。如果放置在swiper-container外面，需要自定义样式。-->

            <!-- Add Arrows -->
            <div class="swiper-button-next" style="color: #FFF;">→</div>
            <div class="swiper-button-prev">←</div>
        </div>
    </div>
    <div class="map">
        <div class="onlin_test" id="online_demo">
            <div class="title">
                <h2>广告识别在线测试</h2>
                <a href="javascript:void(0)" id="addRandom">添加随机文本</a>
            </div>
            <div class="hint">
                <span>(请尽量输入与网友聊天类似的语名)</span>
                <span class="key">(快捷键:shift+a)</span>
            </div>

            <div class="text">
                <span class="icon"></span>
                <textarea name="content" id="content" cols="30" rows="10"
                          placeholder="在此输入或者复制您测试的内容，建议不少于10个字"></textarea>
            </div>
            <p class="text_help"><span>*</span>在线测试仅作为通用功能演示，基于机器学习的增强版广告系统。</p>
            <p class="show_result">检测结果:<span id="show_result"></span></p>
            <div class="btn_box">
                <a href="javascript:void(0)" class="btn" id="audit_btn">立即识别</a>
                <p>(快捷键：shift+Enter)</p>
            </div>
        </div>
        <div id="allmap">

        </div>
    </div>
    <div id="about_video" style="display: none;">
        <video src="http://img.yxgames.com/upfiles/123.mp4" controls="controls">
            您的浏览器不支持 video 标签。
        </video>
    </div>
    <{include file="[web]common/right_nav.inc.tpl"}>
    <{include file="[web]common/footer.inc.tpl"}>
    <{/block}>
<{block "body-plus"}>
    <script type="text/javascript" src="http://img.yxgames.com/static/js/swiper.min.js"></script>
    <script type="text/javascript" src="//api.map.baidu.com/api?v=2.0&ak=q7v5K0HCdhDdGGY5GfCRaiSjtvibIyqQ"></script>
    <script type="text/javascript" src="<{'js/layer/mobile/layer.js'|static}>"></script>

    <script>
        (function($){
            var option = {
                pagination: {
                    el: '.swiper-pagination',
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 4,
                slidesPerColumn: 2,
                spaceBetween: 10,
                autoplay:true
            };

            option.slidesPerView = isMobile() ? 2 : 4;
            new Swiper('#swiper2', option);

            new Swiper('#banner', {
                pagination: {
                    el: '.swiper-pagination',
                },
                autoplay : {
                    delay:5000
                }
            });

            var index;
            $('.video_btn').click(function(){
                layerOpen('#about_video');
            });

            function layerOpen(id) {
                index = layer.open({
                    type: 1,
                    title: '',
                    closeBtn: true,
                    content: $(id).html(),
                    end: function (index) {
                        layer.close(index); //鍏抽棴寮圭獥
                        return false;
                    },
                    style: ["border-radius:0.277778rem"]
                });
            }
        })(jQuery);
    </script>
    <script type="text/javascript">
        // 百度地图API功能
        var map = new BMap.Map("allmap");    // 创建Map实例
        map.centerAndZoom(new BMap.Point(114.411037, 30.491327), 16);  // 初始化地图,设置中心点坐标和地图级别
        map.enableScrollWheelZoom();     //开启鼠标滚轮缩放

        var marker = new BMap.Marker(new BMap.Point(114.417725, 30.488487));
        map.addOverlay(marker);
        var licontent = '<div class="map_flag">'
            + '<div class="address">'
            + '<i class="add_icon"></i>'
            + '<h2 class="area">武汉市洪山区</h2>'
            + '<p><i></i><{$_seo->address}></p>'
            + '</div>'
            + '<div class="address">'
            + '<h2><i></i>广州市天河区</h2>'
            + '<p><i></i>中山大道路建工程9号金鹏大厦301</p>'
            + '</div>'
            + '<div class="url"><i></i>http://www.gamegs.cn</div>'
            + '<div class="tel"><i></i><{$_seo->tel}></div>'
            + '<div class="qq"><i></i><{$_seo->qq}></div>'
            + '</div>';


        var opts1 = {width: 300};

        var infoWindow = new BMap.InfoWindow(licontent, opts1);
        marker.openInfoWindow(infoWindow);
    </script>
    <{/block}>
