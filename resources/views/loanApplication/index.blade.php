<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lendable - Test</title>

        <link rel="stylesheet" href="{{asset('css/app.min.css')}}">
        <script src="{{asset('js/jquery.min.js')}}"></script>
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
    

            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                   <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Lendable</h1>
                </div>
                 <div class="flex justify-center">
                   <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Fee Calculator</h2>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">
                        <a  class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-7 h-7 stroke-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z" />
                                    </svg>
                                </div>

                                <form id="calculator-form" class="flex mt-6">
                                    <div>
                                        <div class="flex">
                                            <label class="wd40 text-gray-900 dark:text-white">Term: </label>
                                            <select name="term" id="term" class="rounded-lg wd60">
                                                <option value="12">12 Months</option>
                                                <option value="24">24 Months</option>
                                            </select>
                                        </div>
                                        <div class="mt-6 flex">
                                            <label class="wd40 text-gray-900 dark:text-white">Amount (£): </label>
                                            <input type="text" name="amount" id="amount" class="rounded-lg wd60" placeholder="e.g. 1000">
                                        </div>
                                    </div>
                                    <div class="trigger flex w-16 ">
                                         <i class="arrow"></i>
                                    </div> 
                                </form>
                            </div>
                        </a>

                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">Result</h2>
                                <div id="fee_error" class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                </div>
                                <div class="mt-4 text-gray-500 dark:text-gray-400 text-xl leading-relaxed">
                                    <div class="spinner hide"></div>
                                    <div class="fee-result hide">Fee: £<strong id="fee_result"></strong></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Log</h2>
                                <div id="history" class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center">
                
                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:ml-0">
                        Mauricio Masias
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>var token="<?php echo csrf_token() ?>";</script>
    <script src="{{asset('js/calculate.min.js')}}"></script>
</html>
