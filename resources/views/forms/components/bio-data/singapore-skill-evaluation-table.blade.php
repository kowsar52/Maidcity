<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div wire:model="{{ $getStatePath() }}">
        <table class="table-auto w-full">
            <thead>
            <tr>
                <th class="border px-4 py-2">{{ __('general.s_no') }}</th>
                <th class="border px-4 py-2">{{ __('general.area_of_work') }}</th>
                <th class="border px-4 py-2">{{ __('general.willingness') }}</th>
                <th class="border px-4 py-2">{{ __('general.experience') }}</th>
                <th class="border px-4 py-2">{{ __('general.assessment_observations') }}</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="border px-4 py-2">1</td>
                <td class="border px-4 py-2">Care of Infant/Children</td>
                <td class="border px-4 py-2">
                    <div class="flex items-center">
                        <label for="willing_ness_yes" class="mr-1">Yes</label>
                        <input type="radio" id="willing_ness_yes" name="willing_ness"
                               class="form-radio h-2 w-2 text-indigo-600 transition duration-150 ease-in-out">
                        <label for="willing_ness_no" class="ml-2 mr-1">No</label>
                        <input type="radio" id="willing_ness_no" name="willing_ness"
                               class="form-radio h-2 w-2 text-indigo-600 transition duration-150 ease-in-out">
                    </div>
                </td>
                <td class="border px-4 py-2">
                    <div class="flex items-center">
                        <input type="radio" id="radioButton" name="radioGroup"
                               class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                        <label for="radioButton" class="ml-2">Radio Button</label>
                    </div>
                </td>
                <td class="border px-4 py-2">Row 1, Column 5</td>
            </tr>
            </tbody>
        </table>
    </div>
</x-dynamic-component>
