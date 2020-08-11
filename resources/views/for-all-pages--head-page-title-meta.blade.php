	<?php $route_name = Route::currentRouteName(); ?>
	
	
	@if ( $route_name === "main-template" )
		<title>Laravel</title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
	@elseif ( $route_name === "lorux-landing" )
		<title>Lorux Finance</title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
	@elseif ( $route_name === "123" )
		ПримерПримерПример
	@else
		<?php if( $ignore_title_not_found ): ?> <!-- <?php endif; ?>
				
				<hr color=red>
				<h1>АХТУНГ!!</h1>
				<h3>Не найден TITLE этой страницы в представлении for-all-pages--head-page-title-meta.blade.php</h3>
				<h5>Возможные причнины: </h5>
				<h6>1) Не задано имя роута: ... ->name('123');</h6>
				<h6>2) Не задан elseif в указанном файле.</h6>
				<hr color=red>
				
		<?php if( $ignore_title_not_found ): ?> --> <?php endif; ?>
	@endif
	
	<?php unset($route_name); # 090820 0432 ?>