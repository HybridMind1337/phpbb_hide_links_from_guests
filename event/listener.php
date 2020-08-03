<?php
	namespace hybridmind\hide_url_for_guest\event;
	use Symfony\Component\EventDispatcher\EventSubscriberInterface;
	
	class listener implements EventSubscriberInterface
	{
		protected $config;
		protected $template;
		protected $user;
		
		
		public function __construct(\phpbb\config\config $config, \phpbb\template\template $template,  \phpbb\user $user)
		{
			$this->config = $config;
			$this->template = $template;
			$this->user = $user;
			
			$user->add_lang_ext('hybridmind/hide_url_for_guest', 'hide_url_for_guest');
		}
		
		static public function getSubscribedEvents()
		{
			return array(
			'core.modify_text_for_display_after' => 'hide_link',
			);
		}
		
		public function hide_link($event)
		{
			if($this->user->data['user_id'] == ANONYMOUS) {
			$text = $event['text'];
			
			$href = '#(<a\s[^>]+?>)(.*?</a>)#i';
			$replace = $this->user->lang['HIDE_LINK_FOR_GUESTS'];
			
			$text = preg_replace($href,$replace,$text);
			
			$event['text'] = $text;
		}
	}		
}		