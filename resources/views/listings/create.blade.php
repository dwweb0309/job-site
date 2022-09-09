<x-app-layout>
    <section class="text-gray-600 body-font overflow-hidden">
        <div class="w-full md:w-1/2 py-24 mx-auto">
            <div class="mb-4">
                <h2 class="text-2xl font-medium text-gray-900 title-font">
                    Create a new listing ($99)
                </h2>
            </div>
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('listings.store') }}" id="payment_form" method="post" enctype="multipart/form-data"
                class="bg-gray-100 p-4">
                <div class="mb-4 mx-2">
                    <x-label for="title" value="Job Title" />
                    <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
                        required />
                </div>

                <!-- Apply link -->
                <div class="mb-4 mx-2">
                    <x-label for="apply_link" :value="__('External Link To Apply (leave empty to receive candidates via RecruitGo)')" />

                    <div class="mt-1 flex rounded-md shadow-sm">
                        <x-input id="apply_link" type="text" class="block mt-1 w-full" name="apply_link"
                            :value="old('apply_link')" />
                    </div>
                </div>

                <div class="mb-4 mx-2">
                    <x-label for="tags" value="Tags (separate by comma)" />
                    <x-input id="tags" class="block mt-1 w-full" type="text" name="tags" :value="old('tags')" />
                </div>

                <div class="mb-4 mx-2">
                    <x-label for="currency_code" value="Currency code" />
                    <x-select id="currency_code" class="block mt-1 w-full" :items="$currency_codes" item_value="name"
                    item_text="name" name="currency_code" :value="old('currency_code') ? old('currency_code') : Auth::user()->company->location->currency_code" />
                </div>

                <div class="mb-4 mx-2">
                    <x-label for="content" value="Job description" />
                    <textarea id="content" rows="8"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                        name="content" :value="old('content')"></textarea>
                </div>

                <!-- salary range -->
                <div class="mb-4 mx-2">
                    <x-label for="salary_min" :value="__('Annual gross salary range')" />
                    <div class="flex">
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input id="salary_min" type="number" class="block mt-1 w-full" name="salary_min"
                                :value="old('salary_min')" />
                        </div>
                        <div class="mx-2 mt-4 align-middle">-</div>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input id="salary_max" type="number" class="block mt-1 w-full" name="salary_max"
                                :value="old('salary_max')" />
                        </div>
                    </div>
                </div>



                <!-- min age -->
                <div class="mb-4 mx-2">
                    <x-label for="age_min" :value="__('Candidate age range (optional)')" />
                    <div class="flex">
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input id="age_min" type="number" class="block mt-1 w-full" name="age_min"
                                :value="old('age_min')" />
                        </div>
                        <div class="mx-2 mt-4 align-middle">-</div>
                        <div class="mt-1 flex rounded-md shadow-sm">
                            <x-input id="age_max" type="number" class="block mt-1 w-full" name="age_max"
                                :value="old('age_max')" />
                        </div>
                    </div>
                </div>


                <fieldset class="mb-4 mx-2">
                    <legend class="sr-only">Work arrangement</legend>
                    <div class="text-base font-medium text-gray-900" aria-hidden="true">Work arrangement</div>
                    <div class="mt-4 space-y-4">
                        <div class="relative flex items-start">
                            <div class="flex h-5 items-center">
                                <input type="checkbox" id="inperson_allowed" name="inperson_allowed"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="inperson_allowed" class="font-medium text-gray-700">Working from office
                                    (inperson)</label>
                                <p class="text-gray-500">Employee is expected to work from the office full-time.</p>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex h-5 items-center">
                                <input type="checkbox" id="remote_allowed" name="remote_allowed"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remote_allowed" class="font-medium text-gray-700">Remote work allowed</label>
                                <p class="text-gray-500">Employee can work from home our outside the office.</p>
                            </div>
                        </div>
                        <div class="relative flex items-start">
                            <div class="flex h-5 items-center">
                                <input type="checkbox" id="hybrid_allowed" name="hybrid_allowed"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="hybrid_allowed" class="font-medium text-gray-700">Hybrid work allowed</label>
                                <p class="text-gray-500">Employee can work partly from home but is also expected to
                                    come to office at times.</p>
                            </div>
                        </div>

                    </div>
                </fieldset>



                <div class="mb-4 mt-6 p-2 pt-3 bg-yellow-100 rounded-lg text-yellow-900">
                    <label for="is_highlighted" class="inline-flex items-center font-medium text-sm text-gray-700">
                        <input type="checkbox" id="is_highlighted" name="is_highlighted"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50">

                        <span class="ml-2"><span
                                class="inline-flex items-center rounded-full bg-yellow-400 px-2.5 py-0.5 text-xs font-medium text-yellow-800">Guaranteed
                                result!</span>
                            Have our recruiter handpick you additional 5 qualified candidates ($249)</span>
                    </label>
                </div>
                <div class="mb-6 mx-2">
                    <div id="card-element"></div>
                </div>
                <div class="mb-2 mx-2">
                    @csrf
                    <input type="hidden" id="payment_method_id" name="payment_method_id" value="">
                    <button type="submit" id="form_submit"
                        class="block w-full items-center bg-indigo-500 text-white border-0 py-2 focus:outline-none hover:bg-indigo-600 rounded text-base mt-4 md:mt-0">Pay
                        + Publish listing</button>
                </div>
            </form>
        </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");
        const elements = stripe.elements();
        const cardElement = elements.create('card', {
            classes: {
                base: 'StripeElement rounded-md shadow-sm bg-white px-2 py-3 border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full'
            }
        });
        cardElement.mount('#card-element');
        document.getElementById('form_submit').addEventListener('click', async (e) => {
            // prevent the submission of the form immediately
            e.preventDefault();
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod(
                'card', cardElement, {}
            );
            if (error) {
                alert(error.message);
            } else {
                // card is ok, create payment method id and submit form
                document.getElementById('payment_method_id').value = paymentMethod.id;
                document.getElementById('payment_form').submit();
            }
        })
    </script>
</x-app-layout>
