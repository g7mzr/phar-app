# phar-app

## Introduction

This is test software to develop an understanding in how both github, composer and
php phar files work.

I have developed a small test application that is stored in github and can be built
into a phar file.

I use [clue/phar-composer](https://github.com/clue/phar-composer) to create the phar
file.

##  Usage

To try out phar-app follow the instructions below:

1. The following phar files are required to use phar-app:

    * composer

    * phar-composer

2. Clone phar-app using the following command

    * git clone https://github.com/g7mzr/phar-app.git

3. Run composer install in the phar-app directory.

4. To create the phar file run the following command which assumes that phar-composer in your path

    * phar-composer build phar-app


