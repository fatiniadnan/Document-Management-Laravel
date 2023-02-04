<!DOCTYPE html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <html>
    <body>
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2">
               <div class="p-6">
               <h3>This email was sent by: {{Auth::user()->name}} </h3> <br>
                Please find your file attached to this email.

                </div>
            </div>
        </div>
    </body>
    </html>