<div class="relative">
    <div class="absolute inset-x-0 bottom-0 h-1/2 bg-gray-100"></div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="relative shadow-xl sm:rounded-2xl sm:overflow-hidden">
        <div class="absolute inset-0">
          <img class="h-full w-full object-cover" src="https://images.unsplash.com/photo-1528702748617-c64d49f918af?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1230&q=80&sat=-100" alt="People working on laptops">
          <div class="absolute inset-0 bg-gradient-to-r from-sky-800 to-indigo-700 mix-blend-multiply"></div>
        </div>
        <div class="relative px-4 py-16 sm:px-6 sm:py-24 lg:py-32 lg:px-8">
          <h1 class="text-center text-4xl font-bold tracking-tight sm:text-5xl sm:tracking-tight lg:text-6xl lg:tracking-tight">
            <span class="block text-white">Find a job in Dubai</span>
          </h1>
          <p class="mt-6 max-w-lg mx-auto text-center text-xl text-indigo-200 sm:max-w-3xl">RecruitGo helps you find your dream job in Dubai. Reliable employers, support in arranging paperwork, migration to Dubai.</p>
          <div class="mt-10 max-w-sm mx-auto sm:max-w-none">
            <form class="flex w-full justify-center items-end max-w-lxl mx-auto" action="{{ route('listings.index') }}" method="get">
                <div class="relative mr-4 w-full lg:w-1/2 text-left">
                    <input type="text" id="s" name="s" value="{{ request()->get('s') }}" class="w-full bg-white rounded focus:ring-2 focus:ring-indigo-200 focus:bg-sky-100 border border-sky-300 focus:border-indigo-500 text-base outline-none text-gray-800 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                </div>
                <button class="inline-flex text-white bg-sky-600 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Find</button>
            </form>
            <p class="text-sm mt-2 text-white text-opacity-80 text-center max-w-lg mx-auto">fullstack php, vue and node, react native</p>
        
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Logo Cloud -->
  <div class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
      <p class="text-center text-base font-semibold text-gray-500">Find a job in Dubai from hundreds of top companies</p>
      <div class="mt-6 grid grid-cols-2 gap-8 md:grid-cols-6 lg:grid-cols-5">
        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
          <img class="h-12" src="https://tailwindui.com/img/logos/tuple-logo-gray-400.svg" alt="Tuple">
        </div>
        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
          <img class="h-12" src="https://tailwindui.com/img/logos/mirage-logo-gray-400.svg" alt="Mirage">
        </div>
        <div class="col-span-1 flex justify-center md:col-span-2 lg:col-span-1">
          <img class="h-12" src="https://tailwindui.com/img/logos/statickit-logo-gray-400.svg" alt="StaticKit">
        </div>
        <div class="col-span-1 flex justify-center md:col-span-2 md:col-start-2 lg:col-span-1">
          <img class="h-12" src="https://tailwindui.com/img/logos/transistor-logo-gray-400.svg" alt="Transistor">
        </div>
        <div class="col-span-2 flex justify-center md:col-span-2 md:col-start-4 lg:col-span-1">
          <img class="h-12" src="https://tailwindui.com/img/logos/workcation-logo-gray-400.svg" alt="Workcation">
        </div>
      </div>
    </div>
  </div>
</div>