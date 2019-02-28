@if($portfolios && count($portfolios) > 0)
<div id="content-home" class="content group">
    <div class="hentry group">
        <div class="section portfolio">
            
            <h3 class="title">Latest projects</h3>
            @foreach($portfolios as $k => $item)

            	@if($k == 0)

            		<div class="hentry work group portfolio-sticky portfolio-full-description">
	                	<div class="work-thumbnail">
		                    <a class="thumb">
		                        <img src="{{ asset(env('THEME')) }}/images/projects/0081-385x192.jpg" alt="0081" title="0081" />
		                    </a>
		                    <div class="work-overlay">
		                        <h3>
		                            <a href="{{ asset(env('THEME')) }}/project.html">{{ $item->title}}</a></h3>
		                        <p class="work-overlay-categories">
		                            <img src="{{ asset(env('THEME')) }}/images/categories.png" alt="Categories" /> in: 
		                            <a href="{{ asset(env('THEME')) }}/category.html">{{ $item->filter->title }}</a>
		                        </p>
		                    </div>
                		</div>
                <div class="work-description">
                    <h2><a href="{{ asset(env('THEME')) }}/project.html">{{ $item->title}}</a></h2>
                    <p class="work-categories">in: 
                        <a href="{{ asset(env('THEME')) }}/category.html">{{ $item->filter->title }}</a>
                    </p>
                    <p>
                    	{{ str_limit($item->text, 200) }}
                    </p>
                    <p>
                        <a href="{{ asset(env('THEME')) }}/project.html" class="read-more">|| Read more</a>
                    </p>
                </div>
            </div>
            
            <div class="clear"></div>

            @continue

            @endif

            @endforeach
           
            <div class="clear"></div>
            
            <div class="portfolio-projects">
                
                <div class="related_project">
                    <div class="overlay_a related_img">
                        <div class="overlay_wrapper">
                            <img src="{{ asset(env('THEME')) }}/images/projects/0061-175x175.jpg" alt="0061" title="0061" />						
                            <div class="overlay">
                                <a class="overlay_img" 
                                href="{{ asset(env('THEME')) }}/images/projects/0061.jpg" rel="lightbox" title=""></a>
                                <a class="overlay_project" 
                                href="{{ asset(env('THEME')) }}/project.html"></a>
                                <span class="overlay_title">Love</span>
                            </div>
                        </div>
                    </div>
                    <h4><a href="{{ asset(env('THEME')) }}/project.html">Love</a></h4>
                    <p>Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, [...]
                </div>
                
                <div class="related_project">
                    <div class="overlay_a related_img">
                        <div class="overlay_wrapper">
                            <img src="{{ asset(env('THEME')) }}/images/projects/0071-175x175.jpg" alt="0071" title="0071" />						
                            <div class="overlay">
                                <a class="overlay_img" 
                                href="{{ asset(env('THEME')) }}/images/projects/0071.jpg" rel="lightbox" title=""></a>
                                <a class="overlay_project" 
                                href="{{ asset(env('THEME')) }}/project.html"></a>
                                <span class="overlay_title">Kineda</span>
                            </div>
                        </div>
                    </div>
                    <h4><a href="{{ asset(env('THEME')) }}/project.html">Kineda</a></h4>
                    <p>Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, [...]
                </div>
                
                <div class="related_project">
                    <div class="overlay_a related_img">
                        <div class="overlay_wrapper">
                            <img src="{{ asset(env('THEME')) }}/images/projects/009-175x175.jpg" alt="009" title="009" />						
                            <div class="overlay">
                                <a class="overlay_img" 
                                href="{{ asset(env('THEME')) }}/images/projects/009.jpg" rel="lightbox" title=""></a>
                                <a class="overlay_project" 
                                href="{{ asset(env('THEME')) }}/project.html"></a>
                                <span class="overlay_title">Guanacos</span>
                            </div>
                        </div>
                    </div>
                    <h4><a href="{{ asset(env('THEME')) }}/project.html">Guanacos</a></h4>
                    <p>Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, [...]
                </div>
                
                <div class="related_project_last related_project">
                    <div class="overlay_a related_img">
                        <div class="overlay_wrapper">
                            <img src="{{ asset(env('THEME')) }}/images/projects/0011-175x175.jpg" alt="0011" title="0011" />						
                            <div class="overlay">
                                <a class="overlay_img" 
                                href="{{ asset(env('THEME')) }}/images/projects/0011.jpg" rel="lightbox" title=""></a>
                                <a class="overlay_project" 
                                href="{{ asset(env('THEME')) }}/project.html"></a>
                                <span class="overlay_title">Miller Bob</span>
                            </div>
                        </div>
                    </div>
                    <h4><a href="{{ asset(env('THEME')) }}/project.html">Miller Bob</a></h4>
                    <p>Nullam volutpat, mauris scelerisque iaculis semper, justo odio rutrum urna, [...]
                </div>
                
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- START COMMENTS -->
    <div id="comments">
    </div>
<!-- END COMMENTS -->
</div>
@else
<p class="alert alert-danger">Пока нет работ!</p>
@endif