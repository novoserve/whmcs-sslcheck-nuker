# whmcs-sslcheck-nuker
Make WHMCS great ... using this SSL check nuker.

### Problem
Since the introduction of WHMCS 7.7, they implemented a so called (strange?) SSL Checker, probably due to the partnership with Digicert. Nowadays SSL certificates are not sold like before thanks to the initiatives like LetsEncrypt. Besides the whole concept, this feature is broken as it takes an expensive cURL call for every domain per service. In our situation a customer with a lot of servers and non-resolving hostnames, the page takes around 10 seconds to load.

See more about this problem here: https://whmcs.community/topic/292868-ssl-check-under-clientareaphpactionservices/
As expected, as of today there is no solution from WHMCS, even after more than a year.

### Solution
There are several reasons why we decided to hack around this feature: We simply don't need this feature, we believe this feature is outdated and more importantly this feature is a bad performer. So we decided to nuke this complete feature. The solution is to replace one of the SSL check functions in Downloader.php with one that returns "nothing", instantly. In particular getCertificate() in the Downloader class.

### Installation
- Backup your Downloader.php in /vendor/whmcs/whmcs-foundation/lib/Domain/Ssl
- Move and overwrite the new Downloader.php into /vendor/whmcs/whmcs-foundation/lib/Domain/Ssl
- (Optional) Add the following CSS to custom.css inside /templates/six/css to hide the SSL check columns from the clientarea:
```
#tableServicesList [data-type="service"],
#tableServicesList .sorting_disabled,
#tableDomainsList [data-type="domain"],
#tableDomainsList .sorting_disabled:nth-child(2)
{display: none;}
```
Thanks to brian! for this CSS snippet, taken from https://whmcs.community/topic/292868-ssl-check-under-clientareaphpactionservices/?do=findComment&comment=1311085

### License
MIT License
