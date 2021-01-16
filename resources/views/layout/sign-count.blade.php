<div class="signs-progress" data-petition-id="{{ $petition->id }}">
    <div class="bar-container">
        <div class="bar" style="width: {{$petition->signs_percent}}%;"></div>
    </div>
    <div class="info">
        <div><span class="sign-count">{{$petition->formatted_signs_count}}</span> @lang('petition.signs')</div>
        <div>@lang('petition.goal') {{$petition->formatted_goal}}</div>
    </div>
</div>

<style>
    .signs-progress {
        width: 100%;
        display: flex;
        flex-direction: column;
        margin-top: 15px;
    }

    .signs-progress .bar-container {
        width: 100%;
        background: #cccccc;
        height: 20px;
    }

    .signs-progress .bar-container .bar {
        height: 20px;
        background: #0099cc;
        transition: width 0.5s ease-in;
    }

    .signs-progress .info {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        margin-top: 10px;
    }

    .signs-progress .info > div {
        font-size: 12px;
        font-weight: 400;
        text-transform: uppercase;
        color: #565656;
    }

    @media (max-width: 719px) {
        .signs-progress .info > div {
            font-size: 15px;
        }
    }
</style>
@if($checkSigns ?? false)
    <script>
        (() => {
            let pendingRequest = false;
            setInterval(() => {
                if (!pendingRequest) {
                    pendingRequest = true;
                    fetch("{{ route('api-signs-info', ['ids'=>$petition->id]) }}")
                        .then(result => result.json())
                        .then(updateSigns);
                }
            }, 5000);

            function updateSigns(signs) {
                jq('.signs-progress[data-petition-id="{{ $petition->id }}"]')
                    .forEach(item => {
                        const id = Number(item.attr('data-petition-id'));
                        const signInfo = signs.find(sign => sign.id === id);
                        if (signInfo) {
                            item.select('.sign-count').html(signInfo.signs_count);
                            item.select('.bar').css('width', signInfo.signs_percent + "%");
                        }
                    });
                pendingRequest = false;
            }
        })();
    </script>
@endif
