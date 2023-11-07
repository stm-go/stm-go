
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
           <tbody>
              <tr>
                 <td width="35%">{{ __('Nome do candidato') }}</td>
                 <td>{{ $apply->name }}</td>
              </tr>
              <tr>
                 <td width="35%">{{ __('E-mail do Candidato') }}</td>
                 <td>{{ $apply->email }}</td>
              </tr>
              <tr>
                 <td width="35%">{{ __('Cargo') }}</td>
                 <td> {{ $apply->type }}</td>
              </tr>
              <tr>
                 <td width="35%">{{ __('Salário Esperado do Candidato') }}</td>
                 <td>{{ $apply->expected_salary }}</td>
              </tr>
              <tr>
                 <td width="35%">{{ __('Mensagem do Candidato') }}</td>
                 <td>{{ $apply->message }}</td>
              </tr>
              <tr class="attachment_list">
                 <td width="35%">{{ __('Currículo do Candidato') }}</td>
                 <td><a href="{{ asset('assets/front/application/'.$apply->file) }}" class="btn btn-sm btn-info" download="">{{ __('Download Cv') }}</a></td>
              </tr>
              <tr class="attachment_list">
                 <td width="35%">{{ __('Nenhum Arquivo Selecionado') }}</td>
                 <td>
                     <a href="mailto:{{ $apply->email }}" class="btn btn-primary">Enviar Email</a>
 
                 </td>
              </tr>
           </tbody>
        </table>
     </div>
 
 