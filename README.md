# phar-app

## Introduction

This is test software to develop an understanding in how both github, composer and
php phar files work.

I have developed a small test application that is stored in github and can be built
into a phar file.

I use [MacFJA/PharBuilder](https://github.com/MacFJA/PharBuilder) to create the phar
file.

##  Usage

To try out phar-app follow the instructions below:

1. The following phar files are required to use phar-app:

    * phing

2. Clone phar-app using the following command

    * git clone https://github.com/g7mzr/phar-app.git

3. Run phing in the phar-app directory.  This will:

    * Install composer
    * The project dependencies using composer
    * Build the phar-app.phar file.  This can be found in the build directory.

4. To run phar-app.phar and display the program help us the following command:

    * build/phar-app.phar

## Notes

1.In order to use phing to install composer you will need **wget** installed on your
system.  If **wget** is not installed please install a copy of composer.phar in the build
directory.
