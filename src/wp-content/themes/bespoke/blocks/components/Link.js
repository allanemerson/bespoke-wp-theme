import { URLInputButton } from "@wordpress/block-editor";
export function Link({ link, onUpdate }) {
	return (
		<>
			<URLInputButton
				url={link.url}
				onChange={(url, post) => {
					console.log(post);
					onUpdate({
						url: url,
						id: post?.id,
					});
				}}
			/>
		</>
	);
}
