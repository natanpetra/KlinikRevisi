<?php $baseBeApiUrl = url('/api/backend'); ?>
<?php $addresses = !empty(old('addresses')) ? old('addresses') : $model->addresses ?>
<?php $regionProvinceId = !empty(old('region_province_id')) ? old('region_province_id') : $model->region_city['province_id'] ?? null; ?>
<?php $regionCityId = !empty(old('region_city_id')) ? old('region_city_id') : $model->region_id; ?>
<?php $isActive = !empty(old('is_active')) ? old('is_active') : ($model->is_active ? $model->is_active : 1); ?>
<?php $companyId = !empty(old('company_id')) ? old('company_id') : $model->company_id; ?>
<?php $tempoSelected = !empty(old('tempo_type')) ? old('tempo_type') : $model->tempo_type; ?>
<?php $paymentMethod = !empty(old('payment_method_id')) ? old('payment_method_id') : $model->payment_method_id; ?>
<?php $isAllowedPaylater = !empty(old('is_allowed_paylater')) ? old('is_allowed_paylater') : $model->is_allowed_paylater; ?>

<div class="tab-pane" id="company">
  <div class="form-group">
    <label>Company</label>
    <select class="form-control" name="company_id" style="width: 100%;" tabindex="-1">
    </select>
    <span class="help-block">data company tidak ada? <a class="text-red" href="{{ url('/master/customer/company/create') }}" target="_blank">new company</a></span>
  </div>

  <div class="company_data" style="margin-top: 3rem;"></div>

</div>

<div class="active tab-pane" id="profile">
  <div class="row">
    <div class="col-md-8" style="border-right: 1px solid #d2d6de;">
      <div class="form-group @if($errors->has('name')) has-error @endif">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="customer / vendor name" value="{{ !empty(old('name')) ? old('name') : $model->name }}">
        @if($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
      </div>

      <div class="form-group @if($errors->has('identity_number')) has-error @endif">
        <label for="">Nomor KTP</label>
        <input type="number" class="form-control" name="identity_number" placeholder="customer / vendor nomor KTP" value="{{ !empty(old('identity_number')) ? old('identity_number') : $model->identity_number }}">
        @if($errors->has('identity_number'))
          <span class="help-block">{{ $errors->first('identity_number') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label>Foto KTP</label>
        <span class="show-image-preview pull-right" data-url="{{ $model->identity_image_url }}" @if($model->identity_image) style="display:block" @endif>image preview</span>
        <input type="file" class="has-image-preview form-control" name="identity_image" value="">
      </div>

      <div class="form-group @if($errors->has('phone')) has-error @endif">
        <label for="">Phone</label>
        <input type="number" class="form-control" name="phone" placeholder="customer / vendor phone" value="{{ !empty(old('phone')) ? old('phone') : $model->phone }}" >
        @if($errors->has('phone'))
          <span class="help-block">{{ $errors->first('phone') }}</span>
        @endif
      </div>

      <div class="form-group @if($errors->has('fax')) has-error @endif">
        <label for="">Fax</label>
        <input type="text" class="form-control" name="fax" placeholder="customer / vendor fax" value="{{ !empty(old('fax')) ? old('fax') : $model->fax }}">
        @if($errors->has('fax'))
          <span class="help-block">{{ $errors->first('fax') }}</span>
        @endif
      </div>

      <div class="form-group @if($errors->has('npwp_number')) has-error @endif">
        <label for="">NPWP</label>
        <input type="text" class="form-control" name="npwp_number" placeholder="customer / vendor npwp_number" value="{{ !empty(old('npwp_number')) ? old('npwp_number') : $model->npwp_number }}">
        @if($errors->has('npwp_number'))
          <span class="help-block">{{ $errors->first('npwp_number') }}</span>
        @endif
      </div>

      <div class="form-group @if($errors->has('email')) has-error @endif">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="customer / vendor email" value="{{ !empty(old('email')) ? old('email') : $model->email }}">
        @if($errors->has('email'))
          <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label>Image</label>
        <span class="show-image-preview pull-right" data-url="{{ $model->image_url }}" @if($model->image) style="display:block" @endif>image preview</span>
        <input type="file" class="has-image-preview form-control" name="image" value="">
      </div>

      <div class="form-group @if($errors->has('region_province_id')) has-error @endif">
        <label>Province</label>
        <select class="form-control" name="region_province_id" style="width: 100%;" tabindex="-1"> </select>
        @if($errors->has('region_province_id'))
          <span class="help-block">{{ $errors->first('region_province_id') }}</span>
        @endif
      </div>

      <div class="form-group @if($errors->has('region_city_id')) has-error @endif">
        <label>City</label>
        <select class="form-control" name="region_city_id" style="width: 100%;" tabindex="-1"> </select>
        @if($errors->has('region_city_id'))
          <span class="help-block">{{ $errors->first('region_city_id') }}</span>
        @endif
      </div>

      <div class="form-group">
        <label>Active</label>
        <select class="form-control " name="is_active" style="width: 100%;" tabindex="-1">
            <option value="1" @if($isActive == 1) selected @endif>Yes</option>
            <option value="0" @if($isActive == 0) selected @endif>No</option>
        </select>
      </div>
    </div>

    <div class="col-md-4" style="height: 100%;">
      <label>Image Preview</label>
      <div style="margin-top: 1rem;">
        <img class="image-preview" src="{{ $model->image_url ? $model->image_url : asset('img/no-image.png') }}" width="100%" alt="image preview">
      </div>
    </div>
  </div>
</div>

<div class="tab-pane" id="address">
  <div class="form-group">
    <label for="">Address</label>

    <table id="vue-dynamic-element" class="table table-bordered table-hover">
      <thead>
        <tr class="table-header-primary">
          <th width="62%">Address</th>
          <th width="11%">Default</th>
          <th width="11%">Bill. addr</th>
          <th width="11%">active</th>
          <th width="5%"></th>
        </tr>
      </thead>

      <tbody>
        <tr v-for="(element, i) in elements" :key="element.id">
          <td>
            <input type="hidden" :name="`addresses[${i}][id]`" v-model="element.id">
            <input type="text" class="form-control" :name="`addresses[${i}][address]`" v-model="element.address" placeholder="address">
            <!-- city detail -->
            <label for=""></label>
            <div class="row" style="width: 100%">
              <div class="col-sm-6">
                <label style="font-weight: normal">provinsi</label>
                <vue-select2
                  :url="`{{ $baseBeApiUrl . '/province' }}`"
                  :name="`addresses[${i}][province_id]`"
                  :value="element.province_id"
                  v-on:selected="element.province_id = $event"/>
              </div>
              <div class="col-sm-6">
                <label style="font-weight: normal">kota</label>
                <vue-select2
                  :type="`city`"
                  :url="`{{ $baseBeApiUrl . '/city' . '?province=${element.province_id}' }}`"
                  :name="`addresses[${i}][city_id]`"
                  :value="element.city_id"
                  v-on:selected="element.city_id = $event"/>
              </div>
            </div>

          </td>
          <td>
            <select class="form-control " :name="`addresses[${i}][is_default]`" v-model="element.is_default" @change="onlyOneSetTrue(i, element.is_default, 'is_default')" style="width: 100%;" tabindex="-1">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
          </td>
          <td>
            <select class="form-control " :name="`addresses[${i}][is_billing_address]`" v-model="element.is_billing_address" @change="onlyOneSetTrue(i, element.is_billing_address, 'is_billing_address')" style="width: 100%;" tabindex="-1">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
          </td>
          <td>
            <select class="form-control " :name="`addresses[${i}][is_active]`" v-model="element.is_active" style="width: 100%;" tabindex="-1">
                <option value="0">No</option>
                <option value="1" selected>Yes</option>
            </select>
          </td>
          <td>
            <button type="button" class="btn btn-default text-red" @click="removeElement(i)"><i class="fa fa-minus"></i></button>
          </td>
        </tr>

        <tr>
          <th colspan="4">
            @if($errors->has('addresses.*'))
              <span class="help-block text-red">* {{ $errors->first('addresses.*') }}</span>
            @endif
          </th>
          <th>
            <button type="button" class="btn btn-default text-success" @click="addElement()"><i class="fa fa-plus"></i></button>
          </th>
        </tr>
      </tbody>
    </table>
  </div>

</div>
<!-- 
<div class="tab-pane" id="setting">
  @if($model->application_paylater)
  <div class="callout">
    <label for="">Is Allowed Paylater</label>
    <br>
    <div class="row" style="margin-top: 5px;">
      <div class="col-sm-1">
        <label>
          <input type="radio" class="minimal-red" name="is_allowed_paylater" value="1" @if($isAllowedPaylater == 1) checked @endif>
          <span style="margin-left: 5px; font-weight: normal">Ya</span>
        </label>
      </div>

      <div class="col-sm-1">
        <label>
          <input type="radio" class="minimal-red" name="is_allowed_paylater" value="0" @if($isAllowedPaylater == 0) checked @endif>
          <span style="margin-left: 5px; font-weight: normal">Tidak</span>
        </label>
      </div>

    </div>

  </div>
  @endif

  <div class="form-group @if($errors->has('limit')) has-error @endif">
    <label for="">Credit limit</label>
    <input type="number" class="form-control" name="limit" placeholder="limit" value="{{ !empty(old('limit')) ? old('limit') : $model->limit }}">
    @if($errors->has('limit'))
      <span class="help-block">{{ $errors->first('limit') }}</span>
    @endif
  </div>

  <div class="form-group">
    <label for="">Payment due</label>

    <table class="table">
      <tbody>
        <tr>
          <th width="5%"></th>
          <th width="30%"></th>
          <th width="30%"></th>
        </tr>

        @foreach($tempoTypes as $key => $tempoType)
        <?php $tempoChargeOption = !empty(old('tempo')[$key]['charge_option']) ? old('tempo')[$key]['charge_option'] : $model->tempo[$key]['charge_option'] ?? null; ?>
        <?php $tempoChargeExtend = !empty(old('tempo')[$key]['charge_extend']) ? old('tempo')[$key]['charge_extend'] : $model->tempo[$key]['charge_extend'] ?? null; ?>
        <tr>
          <td><input type="radio" name="tempo_type" class="minimal-red" value="{{ $key }}" @if($tempoSelected == $key) checked @endif></td>
          @if($key == 'NOT_USED')
          <td colspan="2">
            <input type="hidden" name="tempo[{{ $key }}][charge_option]">
            <input type="hidden" name="tempo[{{ $key }}][charge_extend]">
            <div class="col-sm-4"> {{ strtolower(str_replace('_', ' ', $key)) }} </div>
          </td>
          @else
          <td>
            <div class="form-group">
              <div class="col-sm-4">
                <select class="form-control" name="tempo[{{ $key }}][charge_option]" style="width: 100%;" tabindex="-1">
                  @for($i = 0; $i < $tempoType['OPTIONS']; $i++)
                      <option value="{{ $i+1 }}" @if($tempoChargeOption == ($i+1)) selected @endif>{{ $i+1 }}</option>
                      @endfor
                </select>
              </div>

              <div class="col-sm-8">{{ strtolower($key) }}(s) later</div>
            </div>
          </td>
          <td>
            @if($tempoType['EXTEND'] != 0)
            <div class="form-group">
              <div class="col-sm-4">
                <select class="form-control" name="tempo[{{ $key}}][charge_extend]" style="width: 100%;" tabindex="-1">
                    @for($j = 0; $j < $tempoType['EXTEND']; $j++)
                      <option value="{{ $j+1 }}" @if($tempoChargeExtend == ($j+1)) selected @endif>
                        {{ $tempoType['EXTEND'] == 7 ? jddayofweek($j, 2) : $j+1 }}
                      </option>
                    @endfor
                </select>
              </div>

              <div class="col-sm-4">{{ $tempoType['EXTEND'] == 30 ? 'day' : '' }}</div>
            @else
            <input type="hidden" name="tempo[{{ $key }}][charge_extend]">
            @endif
          </td>
          @endif
        </tr>
        @endforeach

      </tbody>

    </table>
  </div>

  <div class="form-group">
    <label>Default Payment Method</label>
    <select class="form-control " name="payment_method_id" style="width: 100%;" tabindex="-1">
      @foreach($paymentMethodOptions as $paymentMethodOption)
        <option value="{{ $paymentMethodOption->id }}" @if($paymentMethod == $paymentMethodOption->id) selected @endif>{{ $paymentMethodOption->name }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group @if($errors->has('markdown_sales')) has-error @endif">
    <label for="">markdown sales (%)</label>
    <input type="number" class="form-control" name="markdown_sales" placeholder="markdown sales" value="{{ !empty(old('markdown_sales')) ? old('markdown_sales') : $model->markdown_sales }}">
    @if($errors->has('markdown_sales'))
      <span class="help-block">{{ $errors->first('markdown_sales') }}</span>
    @endif
  </div>

  <div class="form-group @if($errors->has('markdown_purchase')) has-error @endif">
    <label for="">markdown purchase (%)</label>
    <input type="number" class="form-control" name="markdown_purchase" placeholder="markdown purchase" value="{{ !empty(old('markdown_purchase')) ? old('markdown_purchase') : $model->markdown_purchase }}">
    @if($errors->has('markdown_purchase'))
      <span class="help-block">{{ $errors->first('markdown_purchase') }}</span>
    @endif
  </div>

  <div class="form-group @if($errors->has('minimum_downpayment')) has-error @endif">
    <label for="">Minimum Downpayment (%)</label>
    <input type="number" class="form-control" name="minimum_downpayment" placeholder="Minimum Downpayment" value="{{ !empty(old('minimum_downpayment')) ? old('minimum_downpayment') : $model->minimum_downpayment }}">
    @if($errors->has('minimum_downpayment'))
      <span class="help-block">{{ $errors->first('minimum_downpayment') }}</span>
    @endif
  </div>
</div> -->

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/iCheck/all.css') }}">
@endsection

@section('js')
<script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
<script src="{{ asset('js/vue.js') }}"></script>
<script>
/** region handler */
var loadCityFirstTime = true;
var loadDistrictFirstTime = true;
var baseBeApiUrl = "{{ $baseBeApiUrl }}";
var provinceId = "{{ $regionProvinceId }}";
var cityId = "{{ $regionCityId }}";

select2AjaxHandler('select[name="region_province_id"]', `{{ $baseBeApiUrl . '/province' }}`, provinceId);

$('select[name="region_province_id"]').change(function () {

  if(cityId && loadCityFirstTime) {
    select2AjaxHandler('select[name="region_city_id"]', `{{ $baseBeApiUrl . '/city' }}`, cityId)
    loadCityFirstTime = false;
    return;
  }

  var provinceId = $(this).val();
  $('select[name="region_city_id"]').val('').trigger('change');
  select2AjaxHandler('select[name="region_city_id"]', `{{ $baseBeApiUrl . '/city' . '?province=${provinceId}' }}`, '');
});
/** end region handler */
/** company selection handler */
var select2SelectionTemplate = function (obj) {
  return $(`<span>${obj.name}</span>`)
}
var select2ResultTemplate = function (obj) {
  return $(`<div>
    <div class="text-white pull-right">${obj.business_field}</div>
    <p class="control-label"><b>${obj.name}</b></p>
    <p class="text-white">${obj.npwp}</p>
  </div>`)
}
var companyTemplate = function (obj) {
  $('.company_data').html(`<div>
  <div class="form-group">
      <label>Name</label>
      <p class="text-muted">${obj.name}</p>
    </div>
    <hr>
    <div class="form-group">
      <label>Business Field</label>
      <p class="text-muted">${obj.business_field}</p>
    </div>
    <hr>
    <div class="form-group">
      <label>CEO Name</label>
      <p class="text-muted">${obj.ceo_name}</p>
    </div>
    <hr>
    <div class="form-group">
      <label>NPWP</label>
      <p class="text-muted">${obj.npwp}</p>
    </div>
    <hr>
    <div class="form-group">
      <label>Address</label>
      <p class="text-muted">${obj.address}</p>
    </div>
    <hr>
    <div class="form-group">
      <label>Phone</label>
      <p class="text-muted">${obj.phone}</p>
    </div>
    <hr>
    </div>`)
}
var getCompanyById = function (companyId) {
  return new Promise(function (resolve, reject) {
    $.ajax({
      url: `{{ url('/') }}/api/company/${companyId}`,
      type: "GET",
      success: function (response) { resolve(response) },
      error: function (err) {
        console.log(`[company data] failed fetch : ${err}`)
        reject()
      }
    });
  });
}

@if(!empty($companyId))
  getCompanyById({{ $companyId }}, true).then(function (response) {
    companyTemplate(response)

    var newOption = new Option(`${response.name}`, response.id, true, true);
    $('select[name="company_id"]').append(newOption).trigger('change');
  });
@endif

$('select[name="company_id"]').select2({
  ajax: {
    url: `{{ url('/') }}/api/backend/company`,
    data: function (params) {
      var query = { searchKey: params.term }
      return query;
    }
  },
  templateResult: select2ResultTemplate,
  templateSelection: select2SelectionTemplate
})
.on('change', function () {
  getCompanyById($(this).val()).then(function (response) {
    companyTemplate(response)
  })
});

//iCheck radio button
$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
  checkboxClass: 'icheckbox_minimal-red',
  radioClass   : 'iradio_minimal-red'
})

var elements = <?php echo json_encode($addresses); ?>;
console.log(elements)

Vue.component('vue-select2', {
  template: `<select class="form-control" :name="name" style="width: 100%"> </select>`,
  props: [ 'url', 'name', 'value', 'type' ],
  methods: {
    getDataById (id) {
      var vm = this
      var url = vm.url

      if(vm.type === 'city') {
        urlParse = url.split("?")
        url = urlParse[0]
      }

      $.ajax({
        type: "GET",
        url: `${url}/${id}`,
        success: function (response) {
          var newOption = new Option(response.name, response.id, true, true);
          $(vm.$el).append(newOption).trigger('change');
        },
        error: function (err) {
          console.log(`failed fetch : ${err}`)
        }
      });
    },
  },
  mounted: async function() {
    var vm = this

    await $(this.$el).select2({
      ajax: {
        url: this.url,
        data: function (params) {
          var query = { searchKey: params.term }
          return query;
        },
        processResults: function (data) {
          return {
            results: data.results.map((param) => {
              param.text = param.name
              return param
            })
          }
        }
      },
    })
    .val(this.value)
    .trigger('change')
    .on('change', function () {
      vm.$emit('selected', this.value)
    })

    if(this.value) await this.getDataById (this.value)
  },
  destroyed: function () {
    $(this.$el).off().select2('destroy')
  },
  watch: {
    url: function (url) {
      var vm = this

      $(vm.$el).select2({
        ajax: {
          url: url,
          data: function (params) {
            var query = { searchKey: params.term }
            return query;
          },
          processResults: function (data) {
            return {
              results: data.results.map((param) => {
                param.text = param.name
                return param
              })
            }
          }
        },
      })
      .val(vm.value)
      .trigger('change')
      .on('change', function () {
        vm.$emit('selected', vm.value)
      })
    },
    value: function (value) {
      // update value
      $(this.$el).val(value).trigger('change')
    },
    options: function (options) {
      // update options
      $(this.$el).empty().select2({ data: options })
    }
  },
});

var app = new Vue({
  el: '#vue-dynamic-element',
  data: {
    elements: elements,
  },
  mounted: function () {
    // check if vue working
    console.log(`${this.$el.id} mounted`)

    if(! this.elements.length) this.addElement()
  },
  methods: {
    _randomNumber () {
      return Math.floor(Math.random() * 10)
    },
    addElement () {
      this.elements.push({
        id: this._randomNumber(),
        address: '',
        is_default: 0,
        is_billing_address: 0,
        is_active: 1,
        province_id: null,
        city_id: null
      })
    },
    removeElement (index) {
      if(this.elements.length == 1) return
      this.elements.splice(index, 1)
    },
    onlyOneSetTrue (index, value, attribut) {
      if(value == 1) {
        this.elements.forEach(function (element, i) {
          element[attribut] = 0
        })
      }

      this.elements[index][attribut] = value
    }
  }
})
</script>
@endsection
