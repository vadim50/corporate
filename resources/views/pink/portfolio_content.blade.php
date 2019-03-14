 <!-- START CONTENT -->
<div id="content-page" class="content group">
    <div class="clear"></div>
    <div class="posts">
        <div class="group portfolio-post internal-post">

			@if($portfolio)

            <div id="portfolio" class="portfolio-full-description">
                
                <div class="fulldescription_title gallery-filters">
                    <h1>{{ $portfolio->title }}</h1>
                </div>
                
                <div class="portfolios hentry work group">
                    <div class="work-thumbnail">
                        <a class="thumb">
                        	<img src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->max }}"
                        	alt="0081"
                        	title="0081" />
                        </a>
                    </div>
                    <div class="work-description">
                        <p>{{ $portfolio->text }}</p>
                        <div class="clear"></div>
                        <div class="work-skillsdate">
                            <p class="skills">
                            	<span class="label">
                            	Filter:
                            	</span>
                            	{{ $portfolio->filter->title }}
                            </p>
                            <p class="workdate">
                            	<span class="label">
                            	Customer:
                            	</span>
                            	{{ $portfolio->customer }}
                            </p>
                            <p class="workdate">
                            	<span class="label">
                            	Year:
                            	</span>
                      {{ ($portfolio->created_at) ? $portfolio->created_at->format('Y') : 'No date'}}
                            	</p>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                
                <div class="clear"></div>
                
                <h3>Other Projects</h3>
                @if(!$portfolios->isEmpty())
                <div class="portfolio-full-description-related-projects">
                    
					@foreach($portfolios as $portfolio)
					
					 <div class="related_project">
                        <a class="related_proj related_img" 
                        href="{{ route('portfolios.show', ['alias'=>$portfolio->alias])}}" 
                        title="{{ $portfolio->title }}">
                        	<img src="{{ asset(env('THEME')) }}/images/projects/{{ $portfolio->img->mini }}" alt="0061" title="0061" /></a>
                        <h4>
                        	<a href="{{ route('portfolios.show', ['alias'=>$portfolio->alias])}}">
                        		{{ str_limit($portfolio->title, 12) }}
                        	</a>
                        </h4>
                    </div>
				
					@endforeach
   
                </div>
            @endif
            </div>
        @endif
            <div class="clear"></div>
        </div>
    </div>
</div>