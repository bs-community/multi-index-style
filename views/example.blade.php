@extends('admin.master')

@section('title', trans('GPlane\MultiIndexStyle::config.title'))

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ trans('GPlane\MultiIndexStyle::config.title') }}
    </h1>
    <div class="breadcrumb"></div>
  </section>

  <!-- Main content -->
  <section class="content">

  <a href="javascript:history.back();" class="btn btn-default">Back</a>
    <br><br>
    <pre><code>
//每两行一个菜单项，先是文本，然后链接     One menu item per two lines. First is text to show, and the latter one is link.
//只支持像这样的单行注释      You only can use single line comment like this.
项目 GitHub 地址
//分开也是可以的        Separation is permitted.
https://github.com/printempw/blessing-skin-server
&lt;i&gt;Blessing Studio&lt;/i&gt;
http://blessing.studio
?当前页面打开
admin/plugins/manage?action=config&amp;id=multi-index-style
//显示文本前加个问号表示不在新标签页打开   Open a new page in current tab instead of new tab if using "?"
|:下拉菜单
//|:这个符号表示下拉菜单开头      Mark like |: indicates a beginning of a dropdown menu
||?用户中心
||user
//也是每两行一个菜单项，先是文本，然后链接 One menu item per two lines as well. Also first is text to show, and the latter one is link.
//但要以||开头       But it should starts with ||
||管理面板
||admin
|-这个表示下拉菜单结束，以这个符号开头就行，后面有其它字符没关系
//Mark like |- indicates the end of dropdown menu. It is no matter that some characters following it.
    </code></pre>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@endsection
