# Binary Handler

Simple project to read and write binary files in PHP.

## Background

The project was created out of a desire to have a solution that was a bit simpler than [mdurrant’s 
Binary Reader](https://github.com/mdurrant/php-binary-reader), and which supported writing binary 
files. Some of the differences:

- This project only works on whole bytes. You will have to do any bitmasking yourself.
- This project allows _writing_ binary files, in addition to reading them.
- This project allows creating the reader and writer from a filename, in addition to a string or
  a resource.

Which one is the best fit for your project will depend on your use cases, obviously.

## Usage

Both the BinaryReader and BinaryWriter take a resource. Helper functions are provided to create
them from an already existing string or from a filename. 

## Future plans

- Adding a test suite.
