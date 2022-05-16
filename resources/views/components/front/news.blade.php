
    <!-- NOTICIAS -->
    <div class="col-12">
        <!-- Features -->
            <section class="box features">
                <h2 class="major"><span>Últimas Notícias</span></h2>
                <div>
                    <div class="row">
                        @foreach ($popular_news as $news)
                            <div class="col-3 col-6-medium col-12-small">

                                <!-- Feature -->
                                    <section class="box feature">
                                        <a  href="{{$news->alias}}/{{$news->id}}" target="_blank" class="image featured"><img  src="/{{$news->image}}" alt="" /></a>
                                        <h6><a href="{{$news->alias}}/{{$news->id}}" target="_blank">{{$news->title}}</a></h6>
                                        <p>
                                            {{$news->subtitle}}
                                        </p>
                                    </section>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

    </div>
