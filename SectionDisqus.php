<?php

class SectionDisqus {

	/**
	 * @param OutputPage &$out
	 * @return bool
	 */
	public static function addResources( &$out ) {
		$out->addModules( 'ext.SectionDisqus' );
		return true;
	}

	/**
	 * @param Skin $skin
	 * @param Title $title
	 * @param string $section
	 * @param string $tooltip
	 * @param array &$links
	 * @param string $lang
	 * @return bool
	 */
	public static function addDisqusButton( $skin, $title, $section, $tooltip, &$links, $lang ) {
		$link = [
			'targetTitle' => $title,
			'text' => 'disqus',
			'attribs' => [
				'class' => 'disqus_button',
				'onclick' => "event.preventDefault(); window.showDisqusDialog('$tooltip');"
			],
			'query' => [],
			'options' => []
		];
		$links[] = $link;
		return true;
	}

	/**
	 * @param string &$data
	 * @return bool
	 */
	public static function addDisqusDialog( &$data ) {
		global $wgSectionDisqusShortname, $wgDisqusShortname;
		if ( $wgSectionDisqusShortname !== false ) {
			$shortName = $wgSectionDisqusShortname;
		} elseif ( isset( $wgDisqusShortname ) ) {
			$shortName = $wgDisqusShortname;
		} else {
			// placeholder?
			$shortName = 'your-disqus-shortname';
		}
		$data .= '<div id="disqus_dialog" title="Discuss this section"><div id="disqus_thread"></div></div>';
		$data .= '<script>

			var disqus_shortname = "' . $shortName . '";

			(function() {
				var dsq = document.createElement("script");
				dsq.type = "text/javascript";
				dsq.async = true;
				dsq.src = "//" + disqus_shortname + ".disqus.com/embed.js";
				document.getElementsByTagName("body")[0].appendChild(dsq);
			})();
			</script>';
		return true;
	}
}
