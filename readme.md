# React Laravel Boilerplate

This is the boilerplate that I personally use for getting projects off the ground quickly using my favourite stack of technologies. It uses Laravel as a backend API service, and has a React single page application in the front end.

## Features
- Laravel Passport API authentication
- Login/signup functionality implemented and tested
- Webpack configuration for development and production
- React/Redux single page application using React Router
- Some basic components already built in resources/assets/js/components
- Simple form building using [Redux Form](https://redux-form.com/7.2.0/ "Redux Form")
- Component library and interactive component building via [Storybook](https://storybook.js.org/ "Storybook")
- Hot module reloading for your React components using Webpack Dev Server and [React Hot Module Reloader](https://gaearon.github.io/react-hot-loader/ "React Hot Module Reloader")
- Tailwind CSS for utility class styling (see [https://tailwindcss.com](https://tailwindcss.com))
- Support for scoped styling using React CSS modules using  [Gajus React CSS Modules](https://github.com/gajus/react-css-modules "Gajus React CSS Modules")
- Continous build integration via [Travis CI](https://travis-ci.org/ "Travis CI")

## Installation
I personally use Vagrant and [Homestead](https://laravel.com/docs/5.5/homestead "Homestead"), so these installation instructions assume that you use Homestead as well, but the project's dependencies are very similar to the base Laravel installation, so if you use something else to develop locally, the instructions shouldn't change too much.

- Clone the repository using `git clone https://github.com/huwcarwyn/react-laravel-boilerplate`
- Install composer dependencies using `composer install`
- Install NPM dependencies using `npm install`
- Make sure to create two databases, one main and one for running the tests
- Fill out a .env file in the project root using the .env.example file as a template
- If you want to use the webpack dev server, make sure that the proxy entry in the weback.dev.js

