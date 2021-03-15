# Changelog
All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [2.0.0] - 2021-03-15

### Breaking Changes
- Visibility of properties `$brandIdParameterKey` and `$secretKeyParameterKey` of trait ApiCredentialsTrait changed from public to private

### Added
- phpstan - static code analysis
- New script to composer.json file - 'test'
- Implement response message unit tests
- Implement request messages unit tests
- Add getter for httpMethod property

### Changed
- Implement psr-4 autoload for tests
- Refactor initialize method of `AbstractRequest` class

## [1.0.0] - 2021-03-12
### Added
- Initial release

[Unreleased]: https://github.com/DeH4eG/omnipay-luminor/compare/v2.0.0...HEAD
[2.0.0]: https://github.com/DeH4eG/omnipay-luminor/releases/tag/v2.0.0
[1.0.0]: https://github.com/DeH4eG/omnipay-luminor/releases/tag/v1.0.0