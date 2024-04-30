import { MediaPlaceholder } from "@wordpress/block-editor";
import { image as icon } from "@wordpress/icons";
import { useState } from "@wordpress/element";
export function Video({ video, instructions, label, onUpdate, validationRules }) {
	const [error, setError] = useState(null);
	const validateVideo = function(image) {
		if(typeof validationRules === 'undefined') return true;
		let validations = Object.keys(validationRules);
		if(validations.includes('fileTypes')) {
			if (!validationRules['fileTypes'].includes(image.subtype)) {
				setError('Invalid file type.');
				return false;
			}
		}
		setError(null);
		return true;
	}
	return (
		<>
			{video.url ? (
				<div className="media-item">
					<video src={video.url} />
					<button
						className="components-button is-primary button-remove"
						onClick={() =>
							onUpdate({
								url: null,
								id: null,
							})
						}
					>
						Remove
					</button>
				</div>
			) : (
				<MediaPlaceholder
					onSelect={(video) => {
						if( validateVideo(video) ) {
							onUpdate({
								url: video.url,
								id: video.id,
							});
						}
					}}
					icon={icon}
					allowedTypes={["video"]}
					multiple={false}
					labels={{ title: label ? label : "Media" }}
				>
					{instructions ? (<span className="instructions">{instructions}</span>) : null}
					{error ? (<span className="error">{error}</span>) : null}
				</MediaPlaceholder>
			)}
		</>
	);
}
