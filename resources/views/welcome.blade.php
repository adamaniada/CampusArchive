@extends('layouts.app')

@section('content')
<div class="container">
    <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
            <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
            <p class="lead mb-0"><a href="#" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>

    <div class="row g-5">
        <div class="col-md-8">
            <h3 class="pb-4 mb-4 fst-italic border-bottom">
                From the Firehose
            </h3>

            <div class="row g-5">
                <div class="col-md-12">
                    <h2>Guides</h2>
                    <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
                    <ul class="icon-list ps-0">
                        <li class="d-flex align-items-start mb-1"><a href="../getting-started/introduction/">Bootstrap quick start guide</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="../getting-started/webpack/">Bootstrap Webpack guide</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="../getting-started/parcel/">Bootstrap Parcel guide</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="../getting-started/vite/">Bootstrap Vite guide</a></li>
                        <li class="d-flex align-items-start mb-1"><a href="../getting-started/contribute/">Contributing to Bootstrap</a></li>
                    </ul>
                </div>
            </div>
    
            <article class="blog-post">
                <h2 class="blog-post-title mb-1">Another blog post</h2>
                <p class="blog-post-meta">December 23, 2020 by <a href="#">Jacob</a></p>
        
                <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                <blockquote>
                    <p>Longer quote goes here, maybe with some <em>emphasized text</em> in the middle of it.</p>
                </blockquote>
                <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
            </article>
        </div>

        <div class="col-md-4">
            <div class="position-sticky" style="top: 2rem;">
                <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="fst-italic">About</h4>
                    <p class="mb-0">Customize this section to tell your visitors a little bit about your publication, writers, content, or something else entirely. Totally up to you.</p>
                </div>
      
                <div class="p-4">
                    <h4 class="fst-italic">Archives</h4>
                    <ol class="list-unstyled mb-0">
                        <li><a href="#">March 2021</a></li>
                        <li><a href="#">February 2021</a></li>
                        <li><a href="#">January 2021</a></li>
                        <li><a href="#">December 2020</a></li>
                        <li><a href="#">November 2020</a></li>
                        <li><a href="#">October 2020</a></li>
                        <li><a href="#">September 2020</a></li>
                        <li><a href="#">August 2020</a></li>
                        <li><a href="#">July 2020</a></li>
                        <li><a href="#">June 2020</a></li>
                        <li><a href="#">May 2020</a></li>
                        <li><a href="#">April 2020</a></li>
                    </ol>
                </div>
        
                <div class="p-4">
                    <h4 class="fst-italic">Elsewhere</h4>
                    <ol class="list-unstyled">
                        <li><a href="#">GitHub</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Facebook</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection
