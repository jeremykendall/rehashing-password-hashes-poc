# Rehash Example

## Background

This repo is my attempt to understand and implement @karptonite's blog post
"[Rehashing Password Hashes][1]".  It proves that @karptonite's concept is
viable and, IMHO, a little bit genius.

Also see [@karptonite's comment][2] on my Password Hashing post, which started
this whole exploration.

## Implementing with Password Validator

I [added a test case][3] to the Password Validator library to show that implementing
@karptonite's concept is possible using the existing `UpgradeDecorator`.
Pretty nifty, if I do say so myself.

[1]: http://karptonite.com/2014/05/11/rehashing-password-hashes/
[2]: http://jeremykendall.net/2014/01/04/php-password-hashing-a-dead-simple-implementation/#comment-1382769545
[3]: https://github.com/jeremykendall/password-validator/commit/63e5cdf10d8eef8ec653193ec984f51cccd90532
