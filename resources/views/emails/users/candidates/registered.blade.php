@component('mail::message')

Dear {{ $candidate->name }}

You have successfully signed up for RecruitGo! Hundreds of overseas job opportunities from credible employers are waiting for you.

Here are some tips to make your job hunt more successful:

- **Always keep your profile up to date.** Does your profile photo look professional? Have you added a LinkedIn profile? Every small detail counts and helps you stand out among the job applicants.
- **Only apply for jobs that match your profile.** Make the most out of the job opportunities that you are qualified for and don’t waste any time on the ones you’re not.
- **It’s a marathon, not a sprint.** Don’t give up if you don’t get selected for the first few jobs that you applied for. Eventually you’ll find the job you are looking for!

We wish you best of luck with finding your dream job!

Kind regards,<br>
{{ config('app.name') }}
@endcomponent
