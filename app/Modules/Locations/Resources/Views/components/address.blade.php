<div class="row">
  <div class="col-lg-12">
      <hr>
  </div>
    <div class="col-lg-3">
        {!! Form::openGroup('postal_code', 'CEP*') !!}
        {!! Form::text('postal_code', null,['required','class'=>'cep']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-lg-6">
        {!! Form::openGroup('street', 'Logradouro*') !!}
        {!! Form::text('street', null,['required','class'=>'']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-lg-3">
        {!! Form::openGroup('number', 'Número') !!}
        {!! Form::text('number', null,['class'=>'']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-lg-3">
        {!! Form::openGroup('complement', 'Complemento') !!}
        {!! Form::text('complement', null,['class'=>'']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-lg-5">
        {!! Form::openGroup('district', 'Bairro*') !!}
        {!! Form::text('district', null,['required','class'=>'']) !!}
        {!! Form::closeGroup() !!}
    </div>
    <div class="col-lg-4">
        {!! Form::openGroup('city_id', 'Cidade*') !!}
        {!! Form::select('city_id', $cities, null, ['required', 'placeholder'=>'Selecione',"data-toggle" => "select"]) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

@section('scripts')
  <script>
    $(document).ready(function(){
      $('#postal_code').on('keyup', function() {
            if(this.value.length >= 8) {
                //consulta ajax zipcode
                $("#street").val('buscando...')
                $("#complement").val('buscando...')
                $("#district").val('buscando...')
                $.getJSON("https://viacep.com.br/ws/"+ this.value +"/json/?callback=?", function(dados) {
                    if(dados && dados.erro) {
                        $('#postal_code').val('').focus()
                        return alert('Cep Inválido')
                    }
                    $("#street").val(dados.logradouro)
                    $("#complement").val('')
                    $("#district").val(dados.bairro)

                    var cityId = $('#city_id option:contains('+ dados.localidade +')').val();
                    $('#city_id').val(cityId);
                    $('#city_id').trigger('change');

                    $('#number').val('').focus()
                });
            }
        })
    });
</script>
@endsection
