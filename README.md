# Solr Search Module

A module that adds the ability to index content in a Solr instances, and to then search that content.

Provides a SolrSearchPage type that allows CMS authors to configure a search page within the CMS
to display results without needing to perform code behind to determine how the search works.

# Version Information

* The 2.0 branch is compatible with SilverStripe 3.0
* The master branch is compatible with SilverStripe 3.1

# Requirements

* Solr 4.0 installed and running (a test instance is included, but for production
use, please install and configure)
* The multivaluefield module from https://github.com/nyeholt/silverstripe-multivaluefield

# Quick Usage Overview

## Install Solr (packages available for most OSes)

For demonstration and testing purposes, a standalone Jetty based
installation of solr is available in the solr/ subdirectory. To execute,
simply change to that directory and run java -jar start.jar - the default
settings will be fine for evaluation.

If you are running a custom Solr instance, make sure to copy the
*solr/solr/solr/conf/schema.xml* file to your solr instance - there are
a couple of custom types defined that SilverStripe uses.

If you have a configuration different to the default locahost:8983/solr
configuration, you can configure things by calling

```php
SolrSearchService::$solr_details = array();
```

## Add the extension to your pages

Add the SolrIndexable extension to any SiteTree objects you want to search.
Support for other data objects may work, though file indexing is not yet
supported

```php
Object::add_extension('SiteTree', 'SolrIndexable');
```

By default, the solr indexer will index Title and Content fields. If you want
other fields indexed too, add them to your $searchable\_fields static
variable in your class type.

There is also an **optional** set of extensions available if you wish to enable an additional
SiteTree index based on user permissions (rather than filtering the search result's response).

This *will* require the Queued Jobs module to function, due to the recursive indexing when saving a page.
https://github.com/silverstripe-australia/silverstripe-queuedjobs

```php
Object::add_extension('SiteTree', 'SiteTreePermissionIndexExtension');
Object::add_extension('SolrSearchPage', 'SolrSearchPagePermissionIndexExtension');
```

## Configure your search page

This module creates a new page of type _SolrSearchPage_ in your site's root.
This should be published before being able to perform searches.

## Add the search extension

Finally, the search mechanism needs to be hooked up to your pages. This can be done
by adding the SolrSearchExtension to your Page\_Controller class to make available
the various template hooks

```php
Object::add_extension('Page_Controller', 'SolrSearchExtension');
```

Now, add your searchform wherever you like in your Page template using $SearchForm

## Using facets

First, you need to tell the search page what you're going to be faceting on

```php
SolrSearchPage::$facets = array('MetaKeywords_ms');
```

then make sure that field (MetaKeywords) is included in the list of fields to
index via the searchable\_fields static.

`*_ms` represents a multivalue field.
`*_as` represents a sortable field (which doesn't require tokenization).

## Template options

To customise search results display, provide a SolrSearchPage\_results.ss
file in your theme's templates directory. 

# API

[GitHub Wiki](http://wiki.github.com/nyeholt/silverstripe-solr)

# Administration

If you have ADMIN privileges, you can start and stop the locally bundled
jetty version of solr from within the CMS on the Solr admin section.

To set the java path (if different from /usr/bin/java), set

```php
SolrSearchService::$java_bin
```

to the appropriate path

# Troubleshooting

If you aren't getting any search results, first make sure Solr is running and has been indexed.

# Maintainer Contact

Marcus Nyeholt

<marcus (at) silverstripe (dot) com (dot) au>

# Licensing

Solr is licensed under the Apache License
This module is licensed under the BSD license
