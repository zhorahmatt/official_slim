@extends('admin.layouts.main')

@section('title', 'Messages Compose')
	
@section('contents')
	<div class="hbox hbox-auto-xs hbox-auto-sm" ng-controller="MailCtrl">
		<div class="col w-md bg-light dk b-r bg-auto">
			<div class="wrapper b-b bg">
				<button class="btn btn-sm btn-default pull-right visible-sm visible-xs" ui-toggle="show" target="#email-menu"><i class="fa fa-bars"></i></button>
				<a href="mail_create.html" class="btn btn-sm btn-primary w-xs font-bold">Compose</a>
			</div>
			<div class="wrapper hidden-sm hidden-xs" id="email-menu">
				<ul class="nav nav-pills nav-stacked nav-sm">
					<li><a href="{{ route('messages') }}">Inbox</a></li>
					<li><a href="{{ route('messages_sent') }}">Sent</a></li>
					<li><a href="{{ route('messages_trash') }}">Trash</a></li>
				</ul>
			</div>
		</div>
		<div class="col">
			<!-- header -->
			<div class="wrapper bg-light lter b-b">
				<div class="btn-group m-r-sm">
					<h4>New Message</h4>
				</div>
			</div>
			<!-- / header -->
			<div class="wrapper">
				<form name="newMail" class="form-horizontal m-t-lg ng-pristine ng-valid">
					<div class="form-group">
						<label class="col-lg-2 control-label">To:</label>
						<div class="col-lg-8">
							<input type="text" class="form-control" autocomplete="off" placeholder="ex: example@mail.com">
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Subject:</label>
						<div class="col-lg-8">
							<input type="text" class="form-control ng-pristine ng-untouched ng-valid" ng-model="mail.subject" aria-invalid="false">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Content</label>
						<div class="col-sm-10">
							<div class="btn-toolbar m-b-sm btn-editor" data-role="editor-toolbar" data-target="#editor">
								<div class="btn-group dropdown">
									<a class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" tooltip="Font"><i class="fa text-base fa-font"></i><b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#" dropdown-toggle="" data-edit="fontName Serif" style="font-family:'Serif'">Serif</a></li> 
										<li><a href="#" dropdown-toggle="" data-edit="fontName Sans" style="font-family:'Sans'">Sans</a></li>
										<li><a href="#" dropdown-toggle="" data-edit="fontName Arial" style="font-family:'Arial'">Arial</a></li></ul>
								</div>
								<div class="btn-group dropdown">
									<a class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" tooltip="Font Size"><i class="fa text-base fa-text-height"></i>&nbsp;<b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#" dropdown-toggle="" data-edit="fontSize 5" style="font-size:24px">Huge</a></li>
										<li><a href="#" dropdown-toggle="" data-edit="fontSize 3" style="font-size:18px">Normal</a></li>
										<li><a href="#" dropdown-toggle="" data-edit="fontSize 1" style="font-size:14px">Small</a></li>
									</ul>
								</div>
								<div class="btn-group">
									<a class="btn btn-sm btn-default" data-edit="bold" tooltip="Bold (Ctrl/Cmd+B)"><i class="fa text-base fa-bold"></i></a>
									<a class="btn btn-sm btn-default" data-edit="italic" tooltip="Italic (Ctrl/Cmd+I)"><i class="fa text-base fa-italic"></i></a>
									<a class="btn btn-sm btn-default" data-edit="strikethrough" tooltip="Strikethrough"><i class="fa text-base fa-strikethrough"></i></a>
									<a class="btn btn-sm btn-default" data-edit="underline" tooltip="Underline (Ctrl/Cmd+U)"><i class="fa text-base fa-underline"></i></a>
								</div>
								<div class="btn-group">
									<a class="btn btn-sm btn-default" data-edit="insertunorderedlist" tooltip="Bullet list"><i class="fa text-base fa-list-ul"></i></a>
									<a class="btn btn-sm btn-default" data-edit="insertorderedlist" tooltip="Number list"><i class="fa text-base fa-list-ol"></i></a>
									<a class="btn btn-sm btn-default" data-edit="outdent" tooltip="Reduce indent (Shift+Tab)"><i class="fa text-base fa-dedent"></i></a>
									<a class="btn btn-sm btn-default" data-edit="indent" tooltip="Indent (Tab)"><i class="fa text-base fa-indent"></i></a>
								</div>
								<div class="btn-group">
									<a class="btn btn-sm btn-default btn-info" data-edit="justifyleft" tooltip="Align Left (Ctrl/Cmd+L)"><i class="fa text-base fa-align-left"></i></a>
									<a class="btn btn-sm btn-default" data-edit="justifycenter" tooltip="Center (Ctrl/Cmd+E)"><i class="fa text-base fa-align-center"></i></a>
									<a class="btn btn-sm btn-default" data-edit="justifyright" tooltip="Align Right (Ctrl/Cmd+R)"><i class="fa text-base fa-align-right"></i></a>
									<a class="btn btn-sm btn-default" data-edit="justifyfull" tooltip="Justify (Ctrl/Cmd+J)"><i class="fa text-base fa-align-justify"></i></a>
								</div>
							</div>
							<div ui-jq="wysiwyg" class="form-control h-auto" style="min-height:200px;" contenteditable="true">
								Your messages ...
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-8 col-lg-offset-2">
							<button class="btn btn-info w-xs">Send</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection