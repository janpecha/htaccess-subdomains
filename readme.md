.htaccess for dynamic subdomains
================================

<a href="https://www.patreon.com/bePatron?u=9680759"><img src="https://c5.patreon.com/external/logo/become_a_patron_button.png" alt="Become a Patron!" height="35"></a>


Directory tree
--------------

* DocumentRoot
	* ```www_root``` (for ```www.domain.tld```)
	* ```forum_root``` (for ```forum.domain.tld```)
	* ```support_root``` (for ```support.domain.tld```)
	* ```archive.forum_root``` (for ```archive.forum.domain.tld```)
	* etc.


Features
--------
* dynamic subdomains
* redirecting from ```domain.tld``` to ```www.domain.tld```
* redirecting from ```www.sub.domain.tld``` to ```sub.domain.tld```
* 404 HTTP code for nonexistent subdomains

Article: http://janpecha.blogista.cz/subdomeny-pomoci-htaccess (in Czech)
<br>License: WTFPL

