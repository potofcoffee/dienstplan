# Changelog

All notable changes to this project will be documented in this file. See [standard-version](https://github.com/conventional-changelog/standard-version) for commit guidelines.

## [1.65.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.64.0...v1.65.0) (2021-07-09)


### Features

* Output SongSheetLiturgySheet as a word document ([7da72b7](https://github.com/pfarrplaner/pfarrplaner/commits/7da72b76b17e55c65036d5275f7d4eb3900f7ffa))
* Set document properties on FullTextLiturgySheet, SongSheetLiturgySheet ([c5486e3](https://github.com/pfarrplaner/pfarrplaner/commits/c5486e34032c2d988c39a327a34f2b92487559b6))


### Bug Fixes

* Revert csrf timeout changes (caused 419 errors) ([a89a488](https://github.com/pfarrplaner/pfarrplaner/commits/a89a488cbfab45c3609f5d2ae58194df69c36bff))

## [1.64.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.63.0...v1.64.0) (2021-07-05)


### Features

* CommuniApp integration updated to respect publishing delays ([804b120](https://github.com/pfarrplaner/pfarrplaner/commits/804b1209d3d2ccecde586d86dc5634e8f6b5b121))


### Bug Fixes

* cc_alt_time input has wrong format, producing validation errors ([a390d9d](https://github.com/pfarrplaner/pfarrplaner/commits/a390d9d1fe0ca91dd767a563f888e50f378ddf89))
* Debug logging produces error on CommuniApp updates ([75bdb4f](https://github.com/pfarrplaner/pfarrplaner/commits/75bdb4f412f89466a3424acf9f3f0f7108092ad8))
* Forms expire when tab remains inactive too long ([59f6a97](https://github.com/pfarrplaner/pfarrplaner/commits/59f6a97684ef73c00ca1e76420f86cd1787abf2d))

## [1.63.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.62.0...v1.63.0) (2021-07-02)


### Features

* Add TravelRequestFormReport ([2bbda0d](https://github.com/pfarrplaner/pfarrplaner/commits/2bbda0de30e01ea2dad18ba9ebc65bb6b70d9b27))
* Show button for vacation request in AbsencesTab ([1bcf7b5](https://github.com/pfarrplaner/pfarrplaner/commits/1bcf7b5caf7c397a3ca65e6bbb1af46fc987c4b7))

## [1.62.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.61.0...v1.62.0) (2021-07-01)


### Features

* Automatically create a vacation request form for an absence ([6bb381f](https://github.com/pfarrplaner/pfarrplaner/commits/6bb381ff46de2d5710de9f88dc98ea7722074a24))


### Bug Fixes

* cannot delete attached baptisms/funerals/weddings ([431e6af](https://github.com/pfarrplaner/pfarrplaner/commits/431e6af057d917dbc31f6d89c1f505040c48b4cf))
* Date range input missing on MultipleServicesInput ([c51d013](https://github.com/pfarrplaner/pfarrplaner/commits/c51d01306e0d83893d8e1cef288157a276664da6))
* KonfiAppIntegration fails to save new qr code ([2f91efd](https://github.com/pfarrplaner/pfarrplaner/commits/2f91efd0ef19d99b0c91699a4dde07783378bee1))
* Newly created baptisms are not pre-associated to the correct city ([c8b229d](https://github.com/pfarrplaner/pfarrplaner/commits/c8b229dc4f7d7139760187b4fe6e1ad83bb6e1a1))
* validation errors do not show ([156fb1b](https://github.com/pfarrplaner/pfarrplaner/commits/156fb1bfdad95cc40317d0607823748e2010cac6))

## [1.61.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.60.5...v1.61.0) (2021-06-25)


### Features

* Add FuneralInfoPane in LiturgyEditor ([e1f2bb5](https://github.com/pfarrplaner/pfarrplaner/commits/e1f2bb55b821d9ae0db04bef94ac706145bb8719))
* Add image preview to Attachment ([0639c20](https://github.com/pfarrplaner/pfarrplaner/commits/0639c2059bf66403e6d464e1fef0fbf843c2ef8d)), closes [#90](https://github.com/pfarrplaner/pfarrplaner/issues/90)
* Add relative date for dod to FuneralEditor ([7389e9a](https://github.com/pfarrplaner/pfarrplaner/commits/7389e9adf306cd1a64842e6b103019449a2d4300)), closes [#110](https://github.com/pfarrplaner/pfarrplaner/issues/110)


### Bug Fixes

* Wrong links ([5773a11](https://github.com/pfarrplaner/pfarrplaner/commits/5773a115b29f5a7cd344437f71dd54b2d5912e73))

### [1.60.5](https://github.com/pfarrplaner/pfarrplaner/compare/v1.60.4...v1.60.5) (2021-06-17)


### Features

* Allow selecting existing sermon in LiturgyTree ([1b75f93](https://github.com/pfarrplaner/pfarrplaner/commits/1b75f930d9990b06d9672170aad4a62d083a4f58)), closes [#102](https://github.com/pfarrplaner/pfarrplaner/issues/102)
* File upload via drag and drop ([8e8b077](https://github.com/pfarrplaner/pfarrplaner/commits/8e8b077c2f8ea9f898c19059015be1e91aafe8e5))
* Show a marker in LiturgyTree when an item has personalized data ([c6943f8](https://github.com/pfarrplaner/pfarrplaner/commits/c6943f8214656bd767cccf6f271d877304020343)), closes [#107](https://github.com/pfarrplaner/pfarrplaner/issues/107)
* Show available markers in FreetextEditor ([7bdb29a](https://github.com/pfarrplaner/pfarrplaner/commits/7bdb29a465c5acd91a942c9433207b850ef36348)), closes [#104](https://github.com/pfarrplaner/pfarrplaner/issues/104)
* Users with write access are able to create/edit locations for a city ([cdd695d](https://github.com/pfarrplaner/pfarrplaner/commits/cdd695d18e4a1f2513615f5973206f67fd334d29)), closes [#106](https://github.com/pfarrplaner/pfarrplaner/issues/106)

### [1.60.4](https://github.com/pfarrplaner/pfarrplaner/compare/v1.60.3...v1.60.4) (2021-06-17)


### Features

* Show pastor in cases overview on HomeScreen ([bea8452](https://github.com/pfarrplaner/pfarrplaner/commits/bea8452f341ee6dfb743dba287ffc39e4ae32adc))


### Bug Fixes

* BaptismEditor does not update service_id ([67df91e](https://github.com/pfarrplaner/pfarrplaner/commits/67df91e03129e7807590f528ccd1c7a901bbc55b))
* downloading attachment from baptism request fails with error 403 ([027068d](https://github.com/pfarrplaner/pfarrplaner/commits/027068dc4bc2cdc1387fa3b5b8b554bd299c4a2f))

### [1.60.3](https://github.com/pfarrplaner/pfarrplaner/compare/v1.60.2...v1.60.3) (2021-06-14)


### Features

* Show pastor on homescreen overviews ([c959957](https://github.com/pfarrplaner/pfarrplaner/commits/c9599575377ab85deaf79b5241d0097d43340430))


### Bug Fixes

* Baptisms/funerals/weddings from other cities appear on homescreen ([620939a](https://github.com/pfarrplaner/pfarrplaner/commits/620939aeaf540a911794936ba0bba400f8c890be))
* NextOfferingsTab is empty ([140bce5](https://github.com/pfarrplaner/pfarrplaner/commits/140bce5ede5950928c2232ca5802b27d24db6825))

### [1.60.2](https://github.com/pfarrplaner/pfarrplaner/compare/v1.60.1...v1.60.2) (2021-06-11)


### Bug Fixes

* BaptismEditor won't save correctly ([6185af7](https://github.com/pfarrplaner/pfarrplaner/commits/6185af7814d91faf504edaa82d03d7ac206ae5f7))
* Wizard buttons should use Inertia for baptism/funeral ([0e381d3](https://github.com/pfarrplaner/pfarrplaner/commits/0e381d3b055c0bf812874e372953e83487b4b3b6))

### [1.60.1](https://github.com/pfarrplaner/pfarrplaner/compare/v1.60.0...v1.60.1) (2021-06-11)


### Features

* Additional liturgical info and copyable bible references in LiturgyEditor ([d959a96](https://github.com/pfarrplaner/pfarrplaner/commits/d959a9605c6cec560c963057511b10714286ba4f))
* Show first line of FreeText items ([8c92664](https://github.com/pfarrplaner/pfarrplaner/commits/8c92664490bc131c98028fb207eeccb476024162))


### Bug Fixes

* ReferenceParser always returns single verse ranges ([d9417d9](https://github.com/pfarrplaner/pfarrplaner/commits/d9417d95acfbcc1fc206b86e3bbb28140bea12d4))

## [1.60.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.59.0...v1.60.0) (2021-06-06)


### Features

* Additional liturgical info and copyable bible references in LiturgyEditor ([091c4a6](https://github.com/pfarrplaner/pfarrplaner/commits/091c4a69e40d658f99426824abd6a3ba9d17d260))


### Bug Fixes

* Multiple fixes to ReferenceParser and BibleText services ([cd966ba](https://github.com/pfarrplaner/pfarrplaner/commits/cd966ba28c45bf4b2037d8701e7d91b36692e0f2))
* ReferenceParser fails when first verse range is optional () ([db8815e](https://github.com/pfarrplaner/pfarrplaner/commits/db8815ea9534d32438cc86d4b75dd63a759c5e43))

## [1.59.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.58.1...v1.59.0) (2021-06-06)


### Features

* Add link to Youtube's livestreaming dashboard to StreamingTab ([976fd7f](https://github.com/pfarrplaner/pfarrplaner/commits/976fd7f4158ae303980eb29d05ea651ca6e64d2b))
* LiturgySheet configuration moved to modal dialogs ([ab263c4](https://github.com/pfarrplaner/pfarrplaner/commits/ab263c41a0868881722c5ffe79dc10d607618e21))


### Bug Fixes

* AttachmentTab doesn't use Inertia for calling LiturgySheet configuration ([3a91a94](https://github.com/pfarrplaner/pfarrplaner/commits/3a91a9475f3b5c38efb28b2b52cce804fb9a0702))
* Created broadcasts have no streaming key ([47f7ecf](https://github.com/pfarrplaner/pfarrplaner/commits/47f7ecf1c4d06b435bfbaf32e2a7638f87330c4f))
* Deleting wrong verses in SongEditor ([cc40417](https://github.com/pfarrplaner/pfarrplaner/commits/cc40417feed060becebca00df206f825d6f14480)), closes [#85](https://github.com/pfarrplaner/pfarrplaner/issues/85)
* Modal dialogs default width does not scale on mobile devices ([7eb8c44](https://github.com/pfarrplaner/pfarrplaner/commits/7eb8c44d16431136aa19ae440f5e8aa816011115))
* youtube:update command does not set streaming key when previous streaming is null ([aa68ac0](https://github.com/pfarrplaner/pfarrplaner/commits/aa68ac0244ee30aeb600b7345d73a98466cc32fb))

### [1.58.1](https://github.com/pfarrplaner/pfarrplaner/compare/v1.58.0...v1.58.1) (2021-06-05)


### Bug Fixes

* FormCheck does not handle 0 values correctly ([bad74b8](https://github.com/pfarrplaner/pfarrplaner/commits/bad74b84fb6762883874ae7b7be057dcc274997f))
* LiturgySheet configuration does not correctly remember user settings ([ee5e770](https://github.com/pfarrplaner/pfarrplaner/commits/ee5e770e3209cebf7d995b961175556ed3fd9533))

## [1.58.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.57.0...v1.58.0) (2021-06-05)


### Features

* LiturgySheets (here: FullTextLiturgySheet) can optionally be configured ([d1d24ff](https://github.com/pfarrplaner/pfarrplaner/commits/d1d24ff19b3bbd2b4bd2effe2480b6f0e681516e))

## [1.57.0](https://github.com/pfarrplaner/pfarrplaner/compare/v1.56.0...v1.57.0) (2021-06-05)


### Bug Fixes

* Manual paths need to be relative in order to work on GitHub ([908c7ea](https://github.com/pfarrplaner/pfarrplaner/commits/908c7ea960a394afb455d8cda33ec2f1413471db))
* Prevent attempt to unserialize twice ([98c03ff](https://github.com/pfarrplaner/pfarrplaner/commits/98c03ff4ebac1c03180810f83776433bb5a94ef0))

## [1.56.0](https://github.com/potofcoffee/pfarrplaner/compare/v1.55.4...v1.56.0) (2021-06-05)


### Features

* Add manual builder command ([366ce5c](https://github.com/potofcoffee/pfarrplaner/commits/366ce5c78dd3dcf8e1526449c63a68b116339556))
* Allow linking to .md file paths ([b17a263](https://github.com/potofcoffee/pfarrplaner/commits/b17a2631c8a3139ee7a202b52d3d94bb5e4fbfd9))
* Basic infrastructure for an online manual ([3391ba4](https://github.com/potofcoffee/pfarrplaner/commits/3391ba4f097ba2c3fa9e32b1b1c8d385db8a48d2))
* Manual builder now creates TOC and moves images ([0b7015f](https://github.com/potofcoffee/pfarrplaner/commits/0b7015f3e0a49b15b0bc011f321e31d7400f5fc5))


### Bug Fixes

* HelpLayout should show TOC link with text ([130d8c4](https://github.com/potofcoffee/pfarrplaner/commits/130d8c40c614b258ad2e1bf20e48a97610846fb1))
* ServiceRequest fails validation when special_location field is not present ([d5cbaed](https://github.com/potofcoffee/pfarrplaner/commits/d5cbaed4d8531c148d841c4f9fbfded6abc0fbc1))
* wrong image path in manual media ([fcbef40](https://github.com/potofcoffee/pfarrplaner/commits/fcbef40355ed285cdaa9a175f940349bfce559e0))

### [1.55.4](https://github.com/potofcoffee/pfarrplaner/compare/v1.55.3...v1.55.4) (2021-06-04)


### Bug Fixes

* AbsenceEditor fails to save replacements ([ac24879](https://github.com/potofcoffee/pfarrplaner/commits/ac24879a7f31334b6b6378ceac4d7aa948cd960f))
* DateRangeInput does not set end of range ([ba2e73c](https://github.com/potofcoffee/pfarrplaner/commits/ba2e73c0f82114d69798f3fe6f3eff0ff89ccae5))
* Planner does not show replacements ([f1c9867](https://github.com/potofcoffee/pfarrplaner/commits/f1c98671ed272699a51a9f1f918b8f4587be4e43))

### [1.55.3](https://github.com/potofcoffee/pfarrplaner/compare/v1.55.2...v1.55.3) (2021-06-03)


### Features

* Automatically create CREDITS.md file ([9d438a7](https://github.com/potofcoffee/pfarrplaner/commits/9d438a7a13a846916ab446b85dc36d4236bed435))
* Show depencency links in CREDITS.md ([74eca03](https://github.com/potofcoffee/pfarrplaner/commits/74eca03fc732c4e6c6424870a7507f266602afb5))

### [1.55.2](https://github.com/potofcoffee/pfarrplaner/compare/v1.55.1...v1.55.2) (2021-06-03)

### [1.55.1](https://github.com/potofcoffee/pfarrplaner/compare/v1.55.0...v1.55.1) (2021-06-03)


### Features

* Show environment type in version info ([ac4c581](https://github.com/potofcoffee/pfarrplaner/commits/ac4c5811c056b4c056473290c1f8b6c967ad7f0d))


### Bug Fixes

* Check for registration document is shown twice in BaptismEditor ([8a020c2](https://github.com/potofcoffee/pfarrplaner/commits/8a020c2f895ea093fd6064d652e15cd8c0955aa8))

## [1.55.0](https://github.com/mokkapps/changelog-generator-demo/compare/v1.54.0...v1.55.0) (2021-06-03)


### Features

* Add new about info with changelog ([88ca927](https://github.com/mokkapps/changelog-generator-demo/commits/88ca927040dfa6b07df955133dfdfa1214307fa2))

## 1.54.0 (2021-06-03)


### Features

* Add changelog generation and semantic versioning ([146fb4e](https://github.com/mokkapps/changelog-generator-demo/commits/146fb4e1a23ed3ab5461e02272eba43237e80ea8))


### Bug Fixes

* Place blocking fails when field is empty ([4647d3d](https://github.com/mokkapps/changelog-generator-demo/commits/4647d3d51635f0a4554462f6d67f02d4232b9587))
