
<div class="header" id="home">
    <div class="left_box">
        <h1 class="logo">
            <a href="<{url('/')}>" title="<{$_seo->name}>">
                <img src="<{null|attachment}>/<{$_seo->logo}>" alt="<{$_seo->name}>">
            </a>
            <em class="open" ></em>
           <!-- <div class="flag">
                <p class="z">舆情管控专家！</p>
            </div>-->
        </h1>
    </div>
    <div class="nav close">
        <ul class="nav-list">
            <li <{if $_nav == ''}>class="act"<{/if}>><a href="<{url('/')}>">首页<span>HOME PAGE</span><em
                        class="line"></em></a></li>
            <li <{if $_nav == 'speclal'}>class="act"<{/if}>><a href="<{url('speclal')}>.html">特色功能<span>SPECLAL FUNCTION</span><em></em></a></li>
            <li <{if $_nav == 'demo'}>class="act"<{/if}>><a href="<{url('demo')}>.html">在线DEMO<span>ONLINE
                    DEMO</span><em></em></a></li>
            <li <{if $_nav == 'news'}>class="act"<{/if}>><a href="<{url('news/center')}>.html">新闻中心<span>NEWS CENTER</span><em></em></a></li>
            <li <{if $_nav == 'document'}>class="act"<{/if}>><a href="<{url('doc')}>.html">技术文档<span>DOCUMENTS</span><em></em></a></li>
            <li <{if $_nav == 'job'}>class="act"<{/if}>><a href="<{url('job')}>.html">加入我们<span>JOIN US</span><em></em></a></li>
            <li <{if $_nav == 'about'}>class="act"<{/if}>><a href="<{url('about')}>.html">关于我们<span>CONTACT
                    US</span><em></em></a></li>
        </ul>
    </div>
</div>
