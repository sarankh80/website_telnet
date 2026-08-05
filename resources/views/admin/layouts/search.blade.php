<fieldset class=" border border-gray-300 dark:border-gray-700 shadow-lg rounded-lg p-4 bg-white dark:bg-[#161b22]">
    <legend class="text-xl font-semibold px-2 text-gray-600 dark:text-blue-400">
        {{ $sub_title ?? 'Search Filters' }}
    </legend>
    <!-- Row 1 -->
    <div class="grid grid-cols-1 md:grid-cols-{{$colspanRow1??4}} gap-4 items-end mb-1">
        <div>
            <label for="keyword" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('admin.search.keyword') ?? 'Keyword' }}
            </label>
            <input type="text" id="keyword" placeholder="{{__('admin.search.__enterKeyword')}}"
                class="w-full text-sm px-2 py-1 rounded border border-gray-300 dark:border-gray-600 dark:bg-[#0d1117] dark:text-white focus:outline-none focus:border-blue-500">
        </div>
        @if(isset($selectRow1) && count($selectRow1)>0)
        @foreach($selectRow1 as $key=>$value)
        <div>
            <label for="{{ App::getLocale() == 'kh'? str_replace(' ', '_', app('translator')->get('admin.search.' . $key, [], 'en')): str_replace(' ', '_', __('admin.search.' . $key))}}" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('admin.search.'.$key) }}
            </label>
            <select id="{{ App::getLocale() == 'kh'? str_replace(' ', '_', app('translator')->get('admin.search.' . $key, [], 'en')): str_replace(' ', '_', __('admin.search.' . $key))}}" class="select2 w-full">
                <option value="">{{__('admin.search._all')}}</option>
                {{!! $value !!}}
            </select>
        </div>
        @endforeach
        @endif

        <div class="flex gap-2">
            <button type="button" id="search"
                class="search flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm py-1 px-4 rounded transition duration-150">
                <i class="fas fa-search mr-1"></i> {{ __('admin.search.search') ?? 'Search' }}
            </button>
            <button type="reset" id="reset" onclick="window.location.href=''"
                class="reset flex-1 bg-red-500 hover:bg-red-600 text-white font-medium text-sm py-1 px-4 rounded transition duration-150">
                {{ __('admin.search.reset') ?? 'Reset' }}
            </button>
        </div>
    </div>
    <!-- Row 2 -->
    <div class="grid grid-cols-1 md:grid-cols-{{$colspanRow2??4}} gap-4 items-end mb-1">
        @if(isset($selectRow2) && count($selectRow2)>0)
        @foreach($selectRow2 as $key=>$value)
        <div>
            <label for="{{ App::getLocale() == 'kh'? str_replace(' ', '_', app('translator')->get('admin.search.' . $key, [], 'en')): str_replace(' ', '_', __('admin.search.' . $key))}}" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('admin.search.'.$key) }}
            </label>
            <select id="{{ App::getLocale() == 'kh'? str_replace(' ', '_', app('translator')->get('admin.search.' . $key, [], 'en')): str_replace(' ', '_', __('admin.search.' . $key))}}" class="select2 w-full">
                <option value="">{{__('admin.search._all')}}</option>
                {{!! $value !!}}
            </select>
        </div>
        @endforeach
        @endif
    </div>
    <!-- Row 3 -->
    <div class="grid grid-cols-1 md:grid-cols-{{$colspanRow1??4}} gap-4 items-end mb-1">
        @if(isset($selectRow3) && count($selectRow3)>0)
        @foreach($selectRow3 as $key=>$value)
        <div>
            <label for="{{ App::getLocale() == 'kh'? str_replace(' ', '_', app('translator')->get('admin.search.' . $key, [], 'en')): str_replace(' ', '_', __('admin.search.' . $key))}}" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{ __('admin.search.'.$key) }}
            </label>
            <select id="{{ App::getLocale() == 'kh'? str_replace(' ', '_', app('translator')->get('admin.search.' . $key, [], 'en')): str_replace(' ', '_', __('admin.search.' . $key))}}" class="select2 w-full">
                <option value="">{{__('admin.search._all')}}</option>
                {{!! $value !!}}
            </select>
        </div>
        @endforeach
        <div>
            <label for="start_date" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{__('admin.search.start_date')}}
            </label>
            <input type="datetime-local" id="start_date" name="start_date"
                class="w-full text-sm px-2 py-1 rounded border border-gray-300 dark:border-gray-600 dark:bg-[#0d1117] dark:text-white focus:outline-none focus:border-blue-500">
        </div>

        <div>
            <label for="end_date" class="block text-xs font-medium text-gray-700 dark:text-gray-300 mb-1">
                {{__('admin.search.end_date')}}
            </label>
            <input type="datetime-local" id="end_date" name="end_date"
                class="w-full text-sm px-2 py-1 rounded border border-gray-300 dark:border-gray-600 dark:bg-[#0d1117] dark:text-white focus:outline-none focus:border-blue-500">
        </div>
        @endif
    </div>
    <!-- Radio Row -->
    <div class="md:col-span-4 mt-2 border-t border-gray-100 dark:border-gray-800 pt-3">
        <div class="flex items-center gap-6">
            @if(isset($radios) && count($radios)>0)
            @foreach($radios as $key=>$value)
            <label class="inline-flex items-center text-xs text-gray-600 dark:text-gray-400 cursor-pointer group">
                <input type="radio" id="{{$key}}" name="choice" value="{{$key}}" class="form-radio h-3.5 w-3.5 text-blue-600 border-gray-300 focus:ring-blue-500" @if($loop->first) checked @endif>
                <span class="ml-2 group-hover:text-blue-500 transition-colors">{{ $value }}</span>
            </label>
            @endforeach
            @endif
        </div>
    </div>
    </div>
</fieldset>