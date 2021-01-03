<div class="results">
    @foreach($petitions as $petition)
        <div class="item" data-id="{{$petition->id}}">
            <div class="title">
                <a href="{{route('single-petition', ['id' => $petition->id])}}">
                    {{$petition->name}}
                </a>
            </div>
            <div class="signs-progress">
                <div class="bar-container">
                    <div class="bar" style="width: {{$petition->signs_percent}}%;"></div>
                </div>
                <div class="info">
                    <div><span class="sign-count">{{$petition->signs_count}}</span> podpisów</div>
                    <div>cel {{$petition->goal}}</div>
                    <div class="sign-petition">
                        <a href="{{route('sign-petition', ['id' => $petition->id])}}">Podpisz</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{method_exists($petitions,'links') ? $petitions->links() : ''}}
</div>
<style>
    .results {
        margin-top: 30px;
        display: grid;
        grid-template-columns: calc(50% - 10px) calc(50% - 10px);
        grid-gap: 20px;
    }

    .results .item {
        padding: 15px;
        border: 1px solid #dedede;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border-radius: 10px;
    }

    .results .item .title {
        font-size: 1.8rem;
    }

    .results .item .title a {
        font-weight: bold;
        color: #09c;
        text-decoration: none;
    }

    .results .item .title a:hover {
        text-decoration: underline;
    }

    .results .item .signs-progress {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-top: 15px;
    }

    .results .item .signs-progress .bar-container {
        width: 100%;
        background: #cccccc;
        height: 20px;
    }

    .results .item .signs-progress .bar-container .bar {
        height: 20px;
        background: #0099cc;
        transition: width 0.5s ease-in;
    }

    .results .item .signs-progress .info {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 10px;
    }

    .results .item .signs-progress .info > div {
        font-size: 12px;
        font-weight: 400;
        text-transform: uppercase;
        color: #565656;
    }

    .results .item .signs-progress .info .sign-petition a {
        font-size: 14px;
        text-decoration: none;
        color: #09c;
    }

    @media (max-width: 719px) {
        .results {
            grid-template-columns: 1fr;
        }

        .results .item .title {
            font-size: 1.3rem;
        }

        .results .item .signs-progress .info > div {
            font-size: 15px;
        }

        .results .item .signs-progress .info .sign-petition a {
            font-size: 17px;
        }
    }
</style>
<script>
    (() => {
        setInterval(() => {
            const ids = getIds();
            fetch("{{route('api-signs-info')}}?ids=" + ids.join(','))
                .then(result => result.json())
                .then(updateSigns);
        }, 5000);

        function getIds() {
            return [...elements('.results .item')]
                .map(item => item.getAttribute('data-id'));
        }

        function updateSigns(signs) {
            elements('.results .item')
                .forEach(item => {
                    const id = Number(item.getAttribute('data-id'));
                    const signInfo = signs.find(sign => sign.id === id);
                    if (signInfo) {
                        item.querySelector('.sign-count').innerHTML = signInfo.signs_count;
                        item.querySelector('.bar').style.width = signInfo.signs_percent + "%";
                    }
                });
        }
    })()
</script>
