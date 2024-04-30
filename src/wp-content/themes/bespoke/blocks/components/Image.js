import { MediaPlaceholder } from "@wordpress/block-editor";
import { image as icon } from "@wordpress/icons";
import { useState } from "@wordpress/element";
export function Image({ image, instructions, label, onUpdate, validationRules }) {
	const [error, setError] = useState(null);
	const validateImage = function(image) {
		if(typeof validationRules === 'undefined') return true;
		let validations = Object.keys(validationRules);
		if(validations.includes('fileTypes')) {
			if (!validationRules['fileTypes'].includes(image.subtype)) {
				setError('Invalid file type.');
				return false;
			}
		}
		if(validations.includes('minWidth')) {
			if (image.width < validationRules['minWidth']) {
				setError('Image must be at least ' + validationRules['minWidth'] + 'px wide');
				return false;
			}
		}
		setError(null);
		return true;
	}
	return (
		<>
			{image.url ? (
				<div className="media-item">
					<img src={image.url} />
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
					onSelect={(image) => {
						if( validateImage(image) ) {
							onUpdate({
								url: image.url,
								id: image.id,
							});
						}
					}}
					icon={icon}
					allowedTypes={["image"]}
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
