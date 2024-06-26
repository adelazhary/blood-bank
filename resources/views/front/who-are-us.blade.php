<x-front.master bodyClass="who-are-us">
    <!--inside-article-->
    <div class="about-us">
        <div class="container">
            <div class="path">
                <x-breadcrumb :items="['Home', 'Who are us']" :routes="['/', '/who-are-us']" />
            </div>
            <div class="details">
                <div class="logo">
                    <img src="{{ asset('front/imgs/logo-ltr.png') }}">
                </div>
                <div class="text">
                    <p>
                        {{ $about }}
                    </p>
                    <p>
                        This text is an example of text that can be replaced in the same space. This text was
                        generated from the Arabic text generator, where you can generate such text or many other
                        texts in addition to increasing the number of characters generated by the application. Many
                        other texts in addition to increasing the number of characters generated by the application.
                    </p>
                </div>
            </div>
        </div>
    </div>

</x-front.master>
