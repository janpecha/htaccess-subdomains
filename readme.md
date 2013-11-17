.htaccess for dynamic subdomains
================================

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

