<!-- Current: "bg-gray-900 text-white", 
     Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
<a {{$attributes}} class="flex items-center rounded-md px-3 py-2 text-sm font-medium {{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">{{$slot}}</a>