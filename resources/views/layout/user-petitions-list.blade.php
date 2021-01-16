<div class="results">
    @foreach($petitions as $petition)
        <div class="item" data-id="{{$petition->id}}">
            <div class="title">
                <a href="{{route('single-petition', ['id' => $petition->id])}}">
                    {{$petition->name}}
                </a>
            </div>
            @include('layout.sign-count', ['petition' => $petition])
            <a href=""></a>
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
        word-break: break-word;
    }

    .results .item .title a:hover {
        text-decoration: underline;
    }

    @media (max-width: 719px) {
        .results {
            grid-template-columns: 1fr;
        }

        .results .item .title {
            font-size: 1.3rem;
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
            return jq('.results .item').map(item => item.attr('data-id'));
        }

        function updateSigns(signs) {
            jq('.results .item')
                .forEach(item => {
                    const id = Number(item.attr('data-id'));
                    const signInfo = signs.find(sign => sign.id === id);
                    if (signInfo) {
                        item.select('.sign-count').html(signInfo.signs_count);
                        item.select('.bar').css('width', signInfo.signs_percent + "%");
                    }
                });
        }
    })()
</script>
