<div class="">
    <h4 class="card-heading">{{__('general.work_experience')}}</h4>
    @foreach($model->workExperienceWithEmployers as $data)
        <table class="w-100">
            <tr>
                <td class="work-td">
                      <span class="fw-bold" style="position: absolute">
                          {{__('general.name_of_employer').' ('.$loop->iteration.')'}}:
                      </span>
                    <div class="w-50 work-td-div">
                        {{ $data->name_of_employer ?? 'N/A'}}
                    </div>
                </td>
                <td class="work-td">
                      <span style="position: absolute">
                          {{(isset($data->present) && $data->present == 1) ? __('general.from_date') : __('general.date_from_to')}}:
                      </span>
                    <div class="w-50 work-td-div">
                        @if(isset($data->present) && $data->present == 1)
                            {{ isset($data->from_date) ? \Carbon\Carbon::parse($data->from_date)->format('d M Y') : 'N/A'  }}
                        @else
                            {{ isset($data->from_date) ? \Carbon\Carbon::parse($data->from_date)->format('d M Y') : 'N/A'  }}
                            - {{ isset($data->to_date) ? \Carbon\Carbon::parse($data->to_date)->format('d M Y') : 'N/A'  }}
                        @endif
                    </div>
                </td>
            </tr>
            <tr>
                <td class="work-td">
                      <span style="position: absolute">
                          {{__('general.country_of_work')}}
                      </span>
                    <div class="w-50 work-td-div">
                        {{ isset($data->country_id) ? \App\Services\GeneralService::getCountries($data->country_id) : 'N/A'  }}
                    </div>
                </td>
                <td class="work-td">
                      <span style="position: absolute">
                          {{__('general.nationality_race')}}:
                      </span>
                    <div class="w-50 work-td-div">
                        {{ $data->nationality ?? 'N/A'  }}
                    </div>
                </td>
            </tr>
            <tr>
                <td class="work-td">
                      <span style="position: absolute">
                          {{__('general.language_used')}}
                      </span>
                    <div class="w-50 work-td-div">
                        {{ $data->language ?? 'N/A'  }}
                    </div>
                </td>
                <td class="work-td">
                      <span style="position: absolute">
                          {{__('general.type_of_house')}}:
                      </span>
                    <div class="w-50 work-td-div">
                        {{ $data->type_of_house ?? 'N/A'  }}
                    </div>
                </td>
            </tr>
            <tr>
                <td class="work-td">
                      <span style="position: absolute">
                          {{__('general.members_in_family')}}:
                      </span>
                    <div class="w-50 work-td-div">
                        {{ $data->members_in_family ?? 'N/A'  }}
                    </div>
                </td>
                <td class="work-td">
                      <span style="position: absolute">
                          {{__('general.starting_last_salary')}}:
                      </span>
                    <div class="w-50 work-td-div">
                        {{ $data->salary ?? 'N/A'  }}
                    </div>
                </td>
            </tr>
            <tr>
                <td class="work-td">
                      <span style="position: absolute">
                          {{__('general.age_of_children_elderly')}}:
                      </span>
                    <div class="w-50 work-td-div">
                        {{ $data->age_of_children ?? 'N/A'  }}
                    </div>
                </td>
                <td class="work-td">
                      <span style="position: absolute">
                         Off Day's Given:
                      </span>
                    <div class="w-50 work-td-div">
                        {{ $data->off_days_given ?? 'N/A'  }}
                    </div>
                </td>
            </tr>
        </table>
        <table class="w-100">
            <tr>
                <td style="padding-bottom: 5px">
                      <span>
                        {{__('general.duties_detail')}}:
                      </span>
                    <div class="work-td-div" style="width: 75%">
                        {{ $data->duties_detail ?? 'N/A'  }}
                    </div>
                </td>
            </tr>
            <tr>
                <td class="pt-0">
                      <span>
                        {{__('general.reason_for_leaving')}}:
                      </span>
                    <div class="work-td-div" style="width: 75%">
                        {{ $data->reason_for_leaving ?? 'N/A'  }}
                    </div>
                </td>
            </tr>
        </table>
    @endforeach
</div>
